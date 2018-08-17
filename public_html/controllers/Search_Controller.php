<?php
defined('BASEPATH') or exit('No direct script access allowed');

require_once APPPATH.'controllers/Authenticated_Controller.php';

class Search_Controller extends Public_Controller
{
    public function index()
    {
        $this->load->library('form_validation');
        $keyword = $this->input->get('s');

        $this->saveKeyword($keyword);
        $serviceProviders = $this->searchServiceProvider($keyword);
        $hospitals = $this->searchHospital($keyword);
        $favoriteEntities = $this->getFavorites();
        
        $injectedScripts[] = '<script type="text/javascript" async="" src="'.$this->config->config['base_url'].'/assets/js/search.js"></script>';
        $this->render('search/search', ['serviceProviders' => $serviceProviders, 'hospitals' => $hospitals, 'injected_scripts' => implode('',$injectedScripts), 'favoriteEntities' => $favoriteEntities]);
    }

    private function searchServiceProvider($keyword) {
        $query = $this->doctrine->em->createQueryBuilder()
                    ->select('c')
                    ->from('GptCompany', 'c')
                    ->leftJoin('c.contacts', 'cc')
                    ->leftJoin('c.services', 's')
                    ->leftJoin('cc.addresses', 'a')
                    ->where('c.companyName LIKE :keyword
                            OR c.companyType LIKE :keyword
                            or c.companyUrl LIKE :keyword
                            or a.streetAddr1 LIKE :keyword
                            or a.streetAddr2 LIKE :keyword
                            or a.streetAddr3 LIKE :keyword
                            or a.city LIKE :keyword
                            or a.state LIKE :keyword
                            or a.country LIKE :keyword
                            or s.serviceName LIKE :keyword
                            or s.serviceCategory LIKE :keyword
                            or s.serviceSubCategory LIKE :keyword'
                    )
                    ->setParameter('keyword', '%'.$keyword.'%')
                    ->getQuery();
        return $query->getResult();
    }

    private function searchHospital($keyword) {
        $query = $this->doctrine->em->createQueryBuilder()
                    ->select('h')
                    ->from('GptHospital', 'h')
                    ->leftJoin('h.departments', 'd')
                    ->leftJoin('GptHospitalServiceXref', 'xs', 'WITH','xs.hospital = h AND xs.department = d')
                    ->leftJoin('xs.service', 's')
                    ->leftJoin('GptHospitalContXref', 'xc', 'WITH','xc.hospital = h AND xc.hospitalDept = d')
                    ->leftJoin('xc.cont', 'c')
                    ->leftJoin('c.addresses', 'a')
                    ->where('h.hospitalName LIKE :keyword
                            OR h.hospitalType LIKE :keyword
                            or h.hospitalUrl LIKE :keyword
                            or a.streetAddr1 LIKE :keyword
                            or a.streetAddr2 LIKE :keyword
                            or a.streetAddr3 LIKE :keyword
                            or a.city LIKE :keyword
                            or a.state LIKE :keyword
                            or a.country LIKE :keyword
                            or s.serviceName LIKE :keyword
                            or s.serviceCategory LIKE :keyword
                            or s.serviceSubCategory LIKE :keyword'
                    )
                    ->setParameter('keyword', '%'.$keyword.'%')
                    ->getQuery();
        return $query->getResult();
    }

    private function saveKeyword($keyword) {
        $em = $this->doctrine->em;
        $object = new GptSearchKeyword();
        $object->setKeyword($keyword);
        $em->persist($object);
        $em->flush();
    }

    private function getFavorites() {
        
        if($this->isLoggedIn() && GptUser::USER_ROLE_PATIENT == $this->getUser()->getRole()){
            $em = $this->doctrine->em;
            $patient = $this->getUser()->getDetail($this->doctrine->em);
            $collection = [];
            foreach($patient->getFavorites() as $favorite) {
                $collection[] = ['id' => $favorite->getReferenceId(), 'type' => $favorite->getType()];
            }
            return $collection;
        }
        return [];
    }

}
