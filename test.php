<?php 
    use AbaFileGenerator\Model\Transaction;
    use AbaFileGenerator\Generator\AbaFileGenerator;

    
    $bsb_number = "123-456";
     $account_number ='12345678';
      $bank_name = 'CBA';
       $direct_entry_id = '175029';
        $description = 'Payroll';
         $amount = '152000';
          $reference = '122';
          $transaction = new Transaction();
        $generator = new AbaFileGenerator(
            $bsb_number, // bsb
            $account_number, // account number
            $bank_name, // bank name
            'User Name',
            'Remitter',
            $direct_entry_id, // direct entry id for CBA
            $description // description
        );
        
    
        
        $transaction->setAccountName($bsb_number);
        $transaction->setAccountNumber($account_number);
        $transaction->setBsb($bank_name);
        $transaction->setTransactionCode('0');
        $transaction->setReference($reference);
        $transaction->setAmount($amount);
    
    
        // Set a custom processing date if required
        $generator->setProcessingDate('tomorrow');
    
        $abaString = $generator->generate($transaction); // $transaction could also be an array here
        file_put_contents('C:/Users/Denton/Downloads', $abaString);
    