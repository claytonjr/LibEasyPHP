<?php

/**
 * LibHealth - A library of functions for working with health. 
 * @author James Clayton <james.r.clayton@gmail.com>
 * @version 0.0.1
 * @copyright (c) 2013, James Clayton
 * @package LibHealth
 * @license http://opensource.org/licenses/ISC ISC License (ISC)
 */

class Health {

	public function PoundsLost($CaloriesBurned) {
		$PoundsLost = $CaloriesBurned / 3500;
		return $PoundsLost;
	}

	/**
     * CaloriesBurned() returns the calories burned. 
     * @param string $Gender Required. No default. Options are M for male or F for female. 
     * @param number $Age Required. No default. 
     * @param number $Weight Required. No default. 
     * @param number $HeartRate Required. No default. Heart rate is the beats per minute, or BPM. 
     * @param number $Time Required. No default. Time is measured only in minutes. 
     * @return number $CaloriesBurned
     */

	public function CaloriesBurned($Gender = Null, $Age = Null, $Weight = Null, $HeartRate = Null, $Time = Null) {
		if($Gender == "M") {
			$CaloriesBurned = ((($Age * 0.2017) + ($Weight * 0.09036) + ($HeartRate * 0.6309) - 55.0969) * $Time) / 4.184;
		} elseif($Gender == "F") {
			$CaloriesBurned = ((($Age * 0.074) - ($Weight * 0.05741) + ($HeartRate * 0.4472) - 20.4022) * $Time) / 4.184;
		} 
		return $CaloriesBurned;
	}

	/**
     * Bmi() returns the the BMI, or body mass index.  
     * @param number $Height Required. No default.  
     * @param number $Weight Required. No default. 
     * @param string $Format Optional. Default is Imperial. Options are Imperial or Metric. 
     * @return number $Bmi 
     */

	public function Bmi($Height, $Weight, $Format = "Imperial") {
		if($Format == "Imperial") {
			$Bmi = ($Weight / ($Height * $Height)) * 703;
		} elseif($Format == "Metric") {
			$Bmi = ($Weight / ($Height * $Height));
		}
		return $Bmi;
	}

	/**
     * BmiStatus() returns the status of the body mass index score  
     * @param number $Bmi Required. No default. Numerical score representing the body mass index. 
     * @return string $BmiStaus Based on the input score, this function will return one of the following outputs: Underweight, Normal weight, Obese, or Extremely Obese; 
     */

	public function BmiStatus($Bmi) {
		if($Bmi < 18.5) {
			$BmiStatus = "Underweight";
		} elseif($Bmi >= 18.5 && $Bmi <= 24.9) {
			$BmiStatus = "Normal weight";
		} elseif($Bmi >= 30.0 && $Bmi <= 40.0) {
			$BmiStatus = "Obese";
		} elseif($Bmi > 40.0) {
			$BmiStatus = "Extremely obese";
		} elseif($Bmi >= 25.0 && $Bmi <= 29.9) {
               $BmiStatus = "Over weight";
       	}
		return $BmiStatus;
	}

	/**
     * WaistHipRatio() returns the ratio of one's hips waist and hips. Waist–hip ratio or waist-to-hip ratio (WHR) is the ratio of the circumference of the waist to that of the hips. 
     * 
     * Document cite: http://en.wikipedia.org/wiki/Waist%E2%80%93hip_ratio
     * 
     * @param number $Waist Required. No default. 
     * @param number $Hips Required. No default. 
     * @return number $WaistHipRatio
     */

	public function WaistHipRatio($Waist, $Hips) {
		$WaistHipRatio = $Waist / $Hips;
		return $WaistHipRatio; 
	}

	/** 
     * @param number $Bust Required. No default. 
     * @param number $Waist Required. No default. 
     * @return number $BustWaistRatio
     */

	public function BustWaistRatio($Bust, $Waist) {
		$BustWaistRatio = $Waist / $Bust;
		return $BustWaistRatio;
	}
}

?>