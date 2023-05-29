<?php    
    class Message{
        private $dbh;
        protected $userCode;        
        private $messageDate;        
        private $messageTo;        
        private $messageSubject;        
        private $messageDescription;
        public function __construct(){
            try {
                $this->dbh = DataBase::connection();
                $a = func_get_args();
                $i = func_num_args();
                if (method_exists($this, $f = '__construct' . $i)) {
                    call_user_func_array(array($this, $f), $a);
                }
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }
        public function __construct5($userCode,$messageDate,$messageTo,$messageSubject,$messageDescription){            
            $this->userCode = $userCode;
            $this->messageDate = $messageDate;
            $this->messageTo = $messageTo;
            $this->messageSubject = $messageSubject;
            $this->messageDescription = $messageDescription;            
        }
        # Código de Usuario
        public function setUserCode($userCode){
            $this->userCode = $userCode;
        }
        public function getUserCode(){
            return $this->userCode;
        }
        # Fecha del Mensaje
        public function setMessageDate($messageDate){
            $this->messageDate = $messageDate;
        }
        public function getMessageDate(){
            return $this->messageDate;
        }        
        # Para Mensaje
        public function setMessageTo($messageTo){
            $this->messageTo = $messageTo;
        }
        public function getMessageTo(){
            return $this->messageTo;
        }        
        # Asunto del Mensaje
        public function setMessageSubject($messageSubject){
            $this->messageSubject = $messageSubject;
        }
        public function getMessageSubject(){
            return $this->messageSubject;
        }        
        # Descripción del Mensaje
        public function setMessageDescription($messageDescription){
            $this->messageDescription = $messageDescription;
        }
        public function getMessageDescription(){
            return $this->messageDescription;
        }

/*  ---------------------------------------------------------------------------  */
/*  ----------------------------- CASOS DE MENSAJES ---------------------------  */
/*  ---------------------------------------------------------------------------  */

        # CU0## - Crear Mensaje Usuario
        public function createMessageUser(){
            try {
                $sql = 'INSERT INTO MESSAGES VALUES (
                            :userCode,
                            :MessageDate,
                            :MessageTo,
                            :MessageSubject,
                            :MessageDescription
                        )';
                $stmt = $this->dbh->prepare($sql);
                $stmt->bindValue('userCode', $this->getUserCode());
                $stmt->bindValue('MessageDate', $this->getMessageDate());
                $stmt->bindValue('MessageTo', $this->getMessageTo());
                $stmt->bindValue('MessageSubject', $this->getMessageSubject());
                $stmt->bindValue('MessageDescription', $this->getMessageDescription());
                $stmt->execute();
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }
        # CU0## - Crear Mensaje
        public function createMessage(){
            try {
                $sql = 'INSERT INTO MESSAGES VALUES (
                            :userCode,
                            :MessageDate,
                            :MessageTo,
                            :MessageSubject,
                            :MessageDescription
                        )';
                $stmt = $this->dbh->prepare($sql);
                $stmt->bindValue('userCode', $this->getUserCode());
                $stmt->bindValue('MessageDate', $this->getMessageDate());
                $stmt->bindValue('MessageTo', $this->getMessageTo());
                $stmt->bindValue('MessageSubject', $this->getMessageSubject());
                $stmt->bindValue('MessageDescription', $this->getMessageDescription());
                $stmt->execute();
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }        
        # CU20 - Consultar Mensajes Usuario
        public function readMessageProfile(){}
        # CU## - Consultar Mensajes
        public function readMessage(){
            try {
                $messageList = [];
                $sql = 'SELECT * FROM USERS INNER JOIN MESSAGES 
                        ON USERS.user_code = MESSAGES.user_code';
                $stmt = $this->dbh->query($sql);                
                foreach ($stmt->fetchAll() as $message) {
                    $messageList[] = new User(
                        $message['user_code'],
                        $message['user_name'],
                        $message['user_lastname'],
                        $message['user_email'],
                        $message['message_date'],
                        $message['message_to'],
                        $message['message_subject'],
                        $message['message_description']
                    );
                }
                return $messageList;
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }
        # CU## - Eliminar Mensaje
        public function deleteMessage($userCode){
             try {
                $sql = 'DELETE FROM MESSAGES WHERE user_code = :userCode';
                $stmt = $this->dbh->prepare($sql);
                $stmt->bindValue('userCode', $userCode);
                $stmt->execute();
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }
        # CU# - Generar reporte impreso de mensajes
        public function printedMessageReport(){}
        # CU# - Generar reporte gráfico de mensajes
        public function graphicMessageReport(){}
    }
?>