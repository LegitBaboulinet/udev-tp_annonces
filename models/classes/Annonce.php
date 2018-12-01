<?php
/**
 * Created by PhpStorm.
 * User: Lucas
 * Date: 01-Dec-18
 * Time: 15:54
 */

class Annonce
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $content;

    /**
     * @var DateTime
     */
    private $date;

    /**
     * Annonce constructor.
     * @param int $id
     * @param string $title
     * @param string $content
     * @param DateTime $date
     */
    public function __construct($id, $title, $content, DateTime $date)
    {
        $this->id = $id;
        $this->title = $title;
        $this->content = $content;
        $this->date = $date;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param string $content
     */
    public function setContent($content)
    {
        $this->content = $content;
    }

    /**
     * @return DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param DateTime $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }
}