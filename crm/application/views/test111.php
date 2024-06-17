//$elderly_data = array(),
        //$other_health_data = array(),

        // elderly_table
       'dataCollector'=> $this->input->post('dataCollector'), 
        'dateofSurvey'=> date('Y-m-d'),
        'nameofElderly'=> $this->input->post('nameofElderly'), 
     'ageofElderly'=> $this->input->post('ageofElderly'),
      'genderofElderly'=> $this->input->post('genderofElderly'),
      'aadharNo'=> $this->input->post('aadharNo'),
        'familyStatus'=> $this->input->post('familyStatus'),
        'familyStatusOtherResponse'=> $this->input->post('familyStatusOtherResponse'),
        'numofFamilyMember'=> $this->input->post('numofFamilyMember'),
        'houseStatus'=> $this->input->post('houseStatus'),
        'cityofCluster'=> $this->input->post('cityofCluster'), 
        'clusterElderlyLives'=> $this->input->post('clusterElderlyLives'),
        'houseAddress'=> $this->input->post('houseAddress'),
        'religion'=> $this->input->post('religion'),
        'religionOther'=> $this->input->post('religionOther'),
        'categoryStatus'=> $this->input->post('categoryStatus'),
        'employmentStatus'=> $this->input->post('employmentStatus'),
        'pension'=> $this->input->post('pension'),
        'typePension'=> $this->input->post('typePension'),
        'pensionOtherSource'=> $this->input->post('pensionOtherSource'),
        'rationCardType'=> $this->input->post('rationCardType'),
        'personalContactNumber'=> $this->input->post('personalContactNumber'),
        'sufferingMajorHealthRelatedProblem'=> $this->input->post('sufferingMajorHealthRelatedProblem'),
        'typesHealthProblem'=> substr(implode(', ', $this->input->post('typesHealthProblem')), 0),

       
        // diabetes
        'howKnowAboutDiabetes'=> substr(implode(', ', $this->input->post('howKnowAboutDiabetes')), 0),
         'howKnowAboutDiabetesSinceWhenDiabetesDiagnosed'=> $this->input->post('howKnowAboutDiabetesSinceWhenDiabetesDiagnosed'),
         'whatSymptomsofDiabetes'=> substr(implode(', ', $this->input->post('whatSymptomsofDiabetes')), 0),
         'whatSymptomsofDiabetesOtherSymptomsDiabetes'=> $this->input->post('whatSymptomsofDiabetesOtherSymptomsDiabetes'),
         'typeofTreatmentDiabetes'=> substr(implode(', ', $this->input->post('typeofTreatmentDiabetes')), 0),
         'typeofTreatmentDiabetesOtherTreatmentforDiabetes'=> $this->input->post('typeofTreatmentDiabetesOtherTreatmentforDiabetes'),
         'currentSupportRequiredDiabetes'=> substr(implode(', ', $this->input->post('currentSupportRequiredDiabetes')), 0),
         'currentSupportRequiredDiabetesOtherSupportRequired'=> $this->input->post('currentSupportRequiredDiabetesOtherSupportRequired'),
         

         
        // heart_cardiac
         'howKnowHeartCardiacProblem'=> substr(implode(', ', $this->input->post('howKnowHeartCardiacProblem')), 0),
         'sinceWhenDiagnosedHeartProblem'=> $this->input->post('sinceWhenDiagnosedHeartProblem'),
         'typesSymptomsHeartCardiacDisease'=> substr(implode(', ', $this->input->post('typesSymptomsHeartCardiacDisease')), 0),
         'otherSymptomsCardiaCheartProblem'=> $this->input->post('otherSymptomsCardiaCheartProblem'),
         'typeoftreatmentHeartCardiacDisease'=>substr(implode(', ', $this->input->post('typeoftreatmentHeartCardiacDisease')), 0),
         'otherTreatmentTakenforHeartCardiacDisease'=> $this->input->post('otherTreatmentTakenforHeartCardiacDisease'),
         'currentSupportHeart'=> substr(implode(', ', $this->input->post('currentSupportHeart')), 0),
         'currentSupportHeartOtherSupportRequired'=> $this->input->post('currentSupportHeartOtherSupportRequired'),

         
        // renal_kidney
        'howKnowRenalKidneyProblems'=> substr(implode(', ', $this->input->post('howKnowRenalKidneyProblems')), 0),
        'sinceWhenRenalKidneyProblem'=> $this->input->post('sinceWhenRenalKidneyProblem'),
        'whatSymptomsRenalKidneyProblem'=> substr(implode(', ', $this->input->post('whatSymptomsRenalKidneyProblem')), 0),
        'otherSymptomsRenalKidneyProblem'=> $this->input->post('otherSymptomsRenalKidneyProblem'),
        'whatTreatmentRenalKidneyProblem'=> substr(implode(', ', $this->input->post('whatTreatmentRenalKidneyProblem')), 0),
        'whatTreatmentRenalKidneyProblemOtherRenalTreatment'=> $this->input->post('whatTreatmentRenalKidneyProblemOtherRenalTreatment'),
        'currentSupportRenalKidneyProblem'=> substr(implode(', ', $this->input->post('currentSupportRenalKidneyProblem')), 0),
        'currentSupportRenalKidneyProblemOtherSupportRequired'=> $this->input->post('currentSupportRenalKidneyProblemOtherSupportRequired'),
        
        
        // cancer
        'howKnowCancer'=> substr(implode(', ', $this->input->post('howKnowCancer')), 0),
        'sinceWhenCancerDiagnosed'=> $this->input->post('sinceWhenCancerDiagnosed'),
        'typeofCancer'=> $this->input->post('typeofCancer'),
        'symptomsCancer'=> substr(implode(', ', $this->input->post('symptomsCancer')), 0),
        'otherSymptomsofCancer'=> $this->input->post('otherSymptomsofCancer'),
        'typeTreatmentCancer'=> substr(implode(', ', $this->input->post('typeTreatmentCancer')), 0),
        'otherCancerTreatment'=> $this->input->post('otherCancerTreatment'),
        'currentSupportCancer'=> substr(implode(', ', $this->input->post('currentSupportCancer')), 0),
        'otherSupportRequiredCancer'=> $this->input->post('otherSupportRequiredCancer'),
        
       
        // degenerative_disorder
        'howKnowDegenerativeDisorder'=> substr(implode(', ', $this->input->post('howKnowDegenerativeDisorder')), 0),
        'degenerativeDisorderName'=> $this->input->post('degenerativeDisorderName'),
        'degenerativeDisorderSinceWhen'=> $this->input->post('degenerativeDisorderSinceWhen'),
        'degenerativeDisorderSymptoms'=> substr(implode(', ', $this->input->post('degenerativeDisorderSymptoms')), 0),
        'degenerativeDisorderOtherSym1'=> $this->input->post('degenerativeDisorderOtherSym1'),
        'degenerativeDisorderTreat'=> substr(implode(', ', $this->input->post('degenerativeDisorderTreat')), 0),
        'degenerativeDisorderTreatOther1'=> $this->input->post('degenerativeDisorderTreatOther1'),
        'degenerativeDisorderSupport'=> substr(implode(', ', $this->input->post('degenerativeDisorderSupport')), 0),
        'degenerativeDisorderSupportOther1'=> $this->input->post('degenerativeDisorderSupportOther1'),
        
        
        // tb
        'howKnowTB'=> substr(implode(', ', $this->input->post('howKnowTB')), 0),
        'sinceWhenTB'=> $this->input->post('sinceWhenTB'),
        'symptomsTB'=> substr(implode(', ', $this->input->post('symptomsTB')), 0),
        'symptomsTBOther1'=> $this->input->post('symptomsTBOther1'),
        'treatmentTB'=> substr(implode(', ', $this->input->post('treatmentTB')), 0),
        'treatmentTBOther1'=> $this->input->post('treatmentTBOther1'),
        'currentSupportTB'=> substr(implode(', ', $this->input->post('currentSupportTB')), 0),
        'currentSupportTBOther1'=> $this->input->post('currentSupportTBOther1'),
        

        
        // hiv_aids
        'howKnowHIV'=> substr(implode(', ', $this->input->post('howKnowHIV')), 0),
        'sinceWhenHIV'=> $this->input->post('sinceWhenHIV'),
        'symptomsHIV'=> substr(implode(', ', $this->input->post('symptomsHIV')), 0),
        'symptomsHIVOther1'=> $this->input->post('symptomsHIVOther1'),
        'treatmentHIV'=> substr(implode(', ', $this->input->post('treatmentHIV')), 0),
        'treatmentHIVOther1'=> $this->input->post('treatmentHIVOther1'),
        'currentSupportHIV'=> substr(implode(', ', $this->input->post('currentSupportHIV')), 0),
        'currentSupportHIVOther1'=> $this->input->post('currentSupportHIVOther1'),


        
       
        // mental
        'howKnowMental'=> substr(implode(', ', $this->input->post('howKnowMental')), 0),
        'sinceWhenMental'=> $this->input->post('sinceWhenMental'),
        'symptomsMental'=> substr(implode(', ', $this->input->post('symptomsMental')), 0),
        'symptomsMentalOther1'=> $this->input->post('symptomsMentalOther1'),
        'treatmentMental'=> substr(implode(', ', $this->input->post('treatmentMental')), 0),
        'treatmentMentalOther1'=> $this->input->post('treatmentMentalOther1'),
        'currentSupportMental'=> substr(implode(', ', $this->input->post('currentSupportMental')), 0),
        'currentSupportMentalOther1'=> $this->input->post('currentSupportMentalOther1'),
        


        
        // fracture
        'howKnowFracture'=> substr(implode(', ', $this->input->post('howKnowFracture')), 0),
        'placeofFracture'=> $this->input->post('placeofFracture'),
        'sinceWhenFracture'=> $this->input->post('sinceWhenFracture'),
        'symptomsFracture'=> substr(implode(', ', $this->input->post('symptomsFracture')), 0),
        'symptomsFractureOther1'=> $this->input->post('symptomsFractureOther1'),
        'treatmentFracture'=> substr(implode(', ', $this->input->post('treatmentFracture')), 0),
        'treatmentFractureOther1'=> $this->input->post('treatmentFractureOther1'),
        'currentSupportFracture'=> substr(implode(', ', $this->input->post('currentSupportFracture')), 0),
        'currentSupportFractureOther1'=> $this->input->post('currentSupportFractureOther1'),
        


       
        // paralysis
        'howKnowParalysis'=> substr(implode(', ', $this->input->post('howKnowParalysis')), 0),
        'sinceWhenParalysis'=> $this->input->post('sinceWhenParalysis'),
        'symptomsParalysis'=> substr(implode(', ', $this->input->post('symptomsParalysis')), 0),
        'symptomsParalysisOther1'=> $this->input->post('symptomsParalysisOther1'),
        'treatmentParalysis'=> substr(implode(', ', $this->input->post('treatmentParalysis')), 0),
        'treatmentParalysisOther1'=> $this->input->post('treatmentParalysisOther1'),
        'currentSupportParalysis'=> substr(implode(', ', $this->input->post('currentSupportParalysis')), 0),
        'currentSupportParalysisOther1'=> $this->input->post('currentSupportParalysisOther1'),
        

       
        // other_health
        'otherHealthProblemName'=> $this->input->post('otherHealthProblemName'),
        'howKnowOtherHealth'=> substr(implode(', ', $this->input->post('howKnowOtherHealth')), 0),
        'sinceWhenOtherHealth'=> $this->input->post('sinceWhenOtherHealth'),
        'symptomsOtherHealth'=> $this->input->post('symptomsOtherHealth'),
        'treatmentOtherHealth'=> $this->input->post('treatmentOtherHealth'),
        'currentSupportOtherHealth'=> $this->input->post('currentSupportOtherHealth'),
        'otherCommonSymptom'=> $this->input->post('otherCommonSymptom'),
        'otherCommonSymptomType'=> substr(implode(', ', $this->input->post('otherCommonSymptomType')), 0),
        'symptomPainWhere'=> substr(implode(', ', $this->input->post('symptomPainWhere')), 0),
        'symptomPainOther1'=> $this->input->post('symptomPainOther1'),
        'sincewhenPainExist'=> $this->input->post('sincewhenPainExist'),
        'treatmentPain'=> substr(implode(', ', $this->input->post('treatmentPain')), 0),
        'treatmentPainOther1'=> $this->input->post('treatmentPainOther1'),
        'sinceWhenWeakness'=> $this->input->post('sinceWhenWeakness'),
        'treatmentWeakness'=> substr(implode(', ', $this->input->post('treatmentWeakness')), 0),
        'treatmentWeaknessOther1'=> $this->input->post('treatmentWeaknessOther1'),
        'sinceWhenSleeplessness'=> $this->input->post('sinceWhenSleeplessness'),
        'treatmentSleeplessness'=> substr(implode(', ', $this->input->post('treatmentSleeplessness')), 0),
        'treatmentSleeplessnessOther1'=> $this->input->post('treatmentSleeplessnessOther1'),
        'sinceWhenConstipation'=> $this->input->post('sinceWhenConstipation'),
        'treatmentConstipation'=> substr(implode(', ', $this->input->post('treatmentConstipation')), 0),
        'treatmentConstipationOther1'=> $this->input->post('treatmentConstipationOther1'),
        'sinceWhenLossOfMemory'=> $this->input->post('sinceWhenLossOfMemory'),
        'treatmentLossOfMemory'=> substr(implode(', ', $this->input->post('treatmentLossOfMemory')), 0),
        'treatmentLossOfMemoryOther1'=> $this->input->post('treatmentLossOfMemoryOther1'),
        'typeOtherCommonProblem'=> $this->input->post('typeOtherCommonProblem'),
        'sinceWhenOtherCommonProblem'=> $this->input->post('sinceWhenOtherCommonProblem'),
        'treatmentOtherCommonProblem'=> $this->input->post('treatmentOtherCommonProblem'),
        'anySupportCommonSymptoms'=> $this->input->post('anySupportCommonSymptoms'),
        'beingTreatedAnyFacility'=> $this->input->post('beingTreatedAnyFacility'),
        'beingTreatedFacilityPlace'=> $this->input->post('beingTreatedFacilityPlace'),
        'beingTreatedFacilityPlaceOther'=> $this->input->post('beingTreatedFacilityPlaceOther'),
        'currentlyTakingAnyMedicines'=> $this->input->post('currentlyTakingAnyMedicines'),
        'currentlyTakingAnyMedicinesType'=> $this->input->post('currentlyTakingAnyMedicinesType'),
        'currentlyTakingAnyMedicinesTypeOther1'=> $this->input->post('currentlyTakingAnyMedicinesTypeOther1'),
        'anyUniqueObservation'=> $this->input->post('anyUniqueObservation'),
        'doYouAnyOtherRequirements'=> $this->input->post('doYouAnyOtherRequirements'),
