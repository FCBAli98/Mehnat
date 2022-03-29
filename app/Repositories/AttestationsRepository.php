<?php 

namespace App\Repositories;

use App\Attestation;


class AttestationsRepository 
{
	public function createAttestation($request)
    {
        $data = [
            'conclusion_number' => $request->conclusion_number,
            'conclusion_date' => $request->conclusion_date,
            'company_name' => $request->company_name,
            'company_tin' => $request->company_tin,
            'xxtut' => $request->xxtut,
            'mxbt' => $request->mxbt,
            'region_id' => $request->region_id,
            'company_id' => $request->company_id,
            'positions_count' => $request->positions_count,
            'number' => $request->number,
            'attestation_company' => $request->attestation_company,
            'attestation_address' => $request->attestation_address,
            'attestation_tin' => $request->attestation_tin,
            'certification_number' => $request->certification_number,
            'expired_at' => $request->expired_at,
            'payed_amount' => $request->payed_amount,

        ];
      
        $employer = Employer::create($data);
        return $employer;
        
    }




}







