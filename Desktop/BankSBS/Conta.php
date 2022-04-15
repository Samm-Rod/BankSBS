<?php 
    Class Conta{
        private $numConta;
        private $tipo;
        private $dono;
        private $saldo;
        private $status;
        private $Conta;
        

     // Métodos
        public function abrirConta($t){
            $this->setTipo($t);
            $this->setStatus(true);
            if($t == "cc"){
                $this->setSaldo(50);
                echo "<p>Conta ",$t," aberta com sucesso com saldo de R$",$this->getSaldo()," na CC</p>";
            }else if($t == "cp"){
                $this->setSaldo(100);
                echo "<p>Conta ",$t," aberta com sucesso com saldo de R$",$this->getSaldo()," na CP</p>";
            }
            echo "<p>Conta aberta com sucesso</p>";
        }

        public function fecharConta(){
            if($this->getStatus()){
                if($this->getSaldo() > 0){
                    echo"<p>Dinehiro em conta não pode fechar</p>";
                }else if($this->getSaldo() < 0){
                    echo"<p>Conta em Débito, impossivel encerrar</p>";
                }else{
                    $this->setStatus(false);
                    echo"<p>Conta fechada</p>";
                }
            }else{
                echo"<p>Conta não está aberta</p>";
            }
            
        }

        public function depositar($v){
            if($this->getStatus()){
                $this->setSaldo($this->getSaldo() + $v);
                echo "<p>Você fez um depósito de R$",$v,"</p>";
            }else{
                echo"<p>Não houve depósito</p>";
            }
        }

        public function sacar($v){
            if($this->getStatus() && $this->getSaldo() > 0){
                $this->setSaldo($this->getSaldo() - $v);
                echo"<p>Saque de R$",$v," feito com sucesso</p>";
            }else{
                echo"<p>Saldo insufuciente</p>";
            }
        }

        public function transferir($Cont, $v){
            if($this->getStatus() && $this->getSaldo() > 0){
                $this->saldo -= $v;
                $Cont->saldo += $v;
                echo"<p>Transferência de R$",$v,"</p>";
            }else{
                echo"<p>Saldo insulficiente para Transferência</p>";
            }
            
        }

        public function extratoConta(){
        print("--------------------------------------"); 
        print("Número da conta: "($this->getNumConta())); 
        print("Dono da conta: "($this->getDono())); 
        print("Tipo da conta: "($this->getTipo())); 
        print("Saldo: "($this->getSaldo())); 
        print("Status da conta: "($this->getNumConta()));
        print("Depósitos: "($this->depositar()));
        print("Saques: "($this->sacar()));
        print("Transferência: "($this->transferir()));
        }

        //Construct
        public function Conta(){
            $this->numConta = $numConta;
            $this->tipo = $tipo;
            $this->dono = $dono;
            $this->saldo = 0;
            $this->status = false;
        }

        //Getters
        function getNumConta(){
            return $this->numConta;
        }

        function getTipo(){
            return $this->tipo;
        }

        function getDono(){
            return $this->dono;
        }

        function getSaldo(){
            return $this->saldo;
        }

        function getStatus(){
            return $this->status;
        }

        function getConta(){
            return $this->cont;
        }

        //Setters
        function setNumConta($numConta){
            $this->numConta = $numConta;
        }

        function setTipo($tipo){
            $this->tipo = $tipo;
        }

        function setDono($dono){
            $this->dono = $dono;
        }

        function setSaldo($saldo){
            $this->saldo = $saldo;
        }

        function setStatus($status){
            $this->status = $status;
        }

        function setConta($Cont){
            $this->Conta = $Cont;
        }
    }
?>