<?php
class Message{
    private $idMessage;
    private $idUser;
    private $typeMessage;    
    private $jauge;
    private $message;
    private $dateMessage;
    private $heureMesage;
    private $state;

    public function __construct(){

    }


    /**
     * Get the value of jauge
     */
    public function getJauge()
    {
        return $this->jauge;
    }

    /**
     * Set the value of jauge
     */
    public function setJauge($jauge): self
    {
        $this->jauge = $jauge;

        return $this;
    }

    /**
     * Get the value of idMessage
     */
    public function getIdMessage()
    {
        return $this->idMessage;
    }

    /**
     * Set the value of idMessage
     */
    public function setIdMessage($idMessage): self
    {
        $this->idMessage = $idMessage;

        return $this;
    }

    /**
     * Get the value of idUser
     */
    public function getIdUser()
    {
        return $this->idUser;
    }

    /**
     * Set the value of idUser
     */
    public function setIdUser($idUser): self
    {
        $this->idUser = $idUser;

        return $this;
    }

    /**
     * Get the value of typeMessage
     */
    public function getTypeMessage()
    {
        return $this->typeMessage;
    }

    /**
     * Set the value of typeMessage
     */
    public function setTypeMessage($typeMessage): self
    {
        $this->typeMessage = $typeMessage;

        return $this;
    }

    /**
     * Get the value of message
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Set the value of message
     */
    public function setMessage($message): self
    {
        $this->message = $message;

        return $this;
    }

    /**
     * Get the value of dateMessage
     */
    public function getDateMessage()
    {
        return $this->dateMessage;
    }

    /**
     * Set the value of dateMessage
     */
    public function setDateMessage($dateMessage): self
    {
        $this->dateMessage = $dateMessage;

        return $this;
    }

    /**
     * Get the value of heureMesage
     */
    public function getHeureMesage()
    {
        return $this->heureMesage;
    }

    /**
     * Set the value of heureMesage
     */
    public function setHeureMesage($heureMesage): self
    {
        $this->heureMesage = $heureMesage;

        return $this;
    }

    public function showError($stmt){
      echo "<pre>";
          print_r($stmt->errorInfo());
      echo "</pre>";
    }
      
    /**
     * AddMessage
     *
     * @return bool
     */
    public function addMessage(): bool {
      $database = new Database();
      $con = $database->_connect();
      $stmt = $con->prepare("INSERT INTO message  VALUES('',?,?,?,?,?,'',0)" );          
         if($stmt->execute([
          $this->getIdUser(),
          $this->getTypeMessage(),
          $this->getJauge(),
          $this->getMessage(),
          $this->getDateMessage()
         ])){
             return true;
         }else{
             $this->showError($stmt);
             return false;
         }
      
    }
  
    function deleteMessage($idMsg){
      $database = new Database();
      $con = $database->_connect();
      $msg_delete = $con->prepare('DELETE FROM message WHERE id_message =?');
      if($msg_delete->execute([$idMsg]))
          {
              return true;
          }else {
  
              $this->showError($msg_delete);
              return false;
          }
  
    }
  

    /**
     * Get the value of state
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * Set the value of state
     */
    public function setState($state): self
    {
        $this->state = $state;

        return $this;
    }
}

?>