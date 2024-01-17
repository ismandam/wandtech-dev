<?php

class Mail{
    private $from;
    private $to;
    private $subject;
    private $header;
    private $message;

    public function __construct()
    {
        
    }

    /**
     * Get the value of from
     */
    public function getFrom()
    {
        return $this->from;
    }

    /**
     * Set the value of from
     */
    public function setFrom($from): self
    {
        $this->from = $from;

        return $this;
    }

    /**
     * Get the value of to
     */
    public function getTo()
    {
        return $this->to;
    }

    /**
     * Set the value of to
     */
    public function setTo($to): self
    {
        $this->to = $to;

        return $this;
    }

    /**
     * Get the value of subject
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * Set the value of subject
     */
    public function setSubject($subject): self
    {
        $this->subject = $subject;

        return $this;
    }

    /**
     * Get the value of header
     */
    public function getHeader()
    {
        return $this->header;
    }

    /**
     * Set the value of header
     */
    public function setHeader($header): self
    {
        $this->header = $header;

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
     * send
     *return true if mail was sended
     * @return bool
     */
    public function send(): bool{
        echo $this->getTo();
        $state = false;
         try {
             mail($this->getTo(),$this->getSubject(),$this->getMessage(),$this->getHeader());
             $state = true;
         } catch (\Throwable $th) {
             $state = false;
             throw $th;
         }

         return $state;
    }
}
?>