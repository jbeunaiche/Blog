	

<?php
class Post

{
    /**
     * @var
     */
    private $id;
    /**
     * @var
     */
    private $title;
    /**
     * @var
     */
    private $resume;
    /**
     * @var
     */
    private $content;
    /**
     * @var
     */
    private $created;

    /**
     * Post constructor.
     * @param array $value
     */
    public function __construct($value = [])

 {
  if (!empty($value))
  {
   $this->hydrate($value);
  }
 }

    /**
     * @param array $data
     */
    public function hydrate(array $data)

 {
  foreach($data as $key => $value)
  {
   // On récupère le nom du setter correspondant à l'attribut.
   $method = 'set' . ucfirst($key);
   // Si le setter correspondant existe.
   if (method_exists($this, $method))
   {
    // On appelle le setter.
    $this->$method($value);
   }
  }
 }
 // Getters

    /**
     * @return mixed
     */
    public function getId()

 {
  return $this->id;
 }

    /**
     * @return mixed
     */
    public function getTitle()

 {
     return $this->title;
 }

    /**
     * @return mixed
     */
    public function getResume()

 {
  return $this->resume;
 }

    /**
     * @return mixed
     */
    public function getContent()

 {
  return $this->content;
 }

    /**
     * @return mixed
     */
    public function getCreated()

 {
  return $this->created;
 }
 // Setters

    /**
     * @param $id
     */
    public function setId($id)

 {
  if ($id > 0)
  {
   $this->id = $id;
  }
 }

    /**
     * @param $title
     */
    public function setTitle($title)

 {
  if (is_string($title))
  {
   $this->title = $title;
  }
 }

    /**
     * @param $resume
     */
    public function setResume($resume)

 {
  if (is_string($resume))
  {
   $this->resume = $resume;
  }
 }

    /**
     * @param $content
     */
    public function setContent($content)

 {
  if (is_string($content))
  {
   $this->content = $content;
  }
 }

    /**
     * @param $created
     */
    public function setCreated($created)

 {
  $this->created = $created;
 }
}
