<?php

/**
 * GptSearchKeyword
 *
 * @Table(name="gpt_search_keyword")
 * @Entity
 */
class GptSearchKeyword
{
    
    /**
     * @var integer
     *
     * @Column(name="keyword_id", type="int", nullable=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $keywordId;
    
    /**
     * @var string
     *
     * @Column(name="keyword", type="string", length=100, nullable=true)
     */
    private $keyword;

    public function getKeyword() {
        return $this->keyword;
    }

    public function setKeyword($keyword) {
        $this->keyword = $keyword;
    }
    
}
