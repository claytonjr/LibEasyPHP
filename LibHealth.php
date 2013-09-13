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
		} elseif($Bmi => 18.5 && $Bmi =< 24.9) {
			$BmiStatus = "Normal weight";
		} elseif($Bmi => 30.0 && $Bmi =< 40.0) {
			$BmiStatus = "Obese";
		} elseif($Bmi > 40.0) {
			$BmiStatus = "Extremely obese";
		}
		return $BmiStatus;
	}

	/**
     * WaistHipRatio() returns the ratio of one's hips waist and hips. Waist–hip ratio or waist-to-hip ratio (WHR) is the ratio of the circumference of the waist to that of the hips. 
     * 
     * According to the World Health Organisation's data gathering protocol, the waist circumference should be measured at the midpoint between the lower margin of the last palpable rib and the top of the iliac crest, using a stretch‐resistant tape that provides a constant 100 g tension. Hip circumference should be measured around the widest portion of the buttocks, with the tape parallel to the floor. Other organizations use slightly different standards. The United States National Institutes of Health and the National Health and Nutrition Examination Survey used results obtained by measuring at the top of the iliac crest. Waist measurements are usually obtained by lay persons by measuring around the waist at the umbilicus, but research has shown that these measurements may underestimate the true waist circumference.
     * 
     * For both measurements, the individual should stand with feet close together, arms at the side and body weight evenly distributed, and should wear little clothing. The subject should be relaxed, and the measurements should be taken at the end of a normal expiration. Each measurement should be repeated twice; if the measurements are within 1 cm of one another, the average should be calculated. If the difference between the two measurements exceeds 1 cm, the two measurements should be repeated.
     * 
     * Practically, however, the waist is more conveniently measured simply at the smallest circumference of the natural waist, usually just above the belly button, and the hip circumference may likewise be measured at its widest part of the buttocks or hip. Also, in case the waist is convex rather than concave, such as is the case in pregnancy and obesity, the waist may be measured at a horizontal level 1 inch above the navel.
     * 
     * Measure of Attractiveness
     * 
     * The concept and significance of WHR as an indicator of attractiveness was first theorized by evolutionary psychologist Devendra Singh at the University of Texas at Austin in 1993.[19][20] Singh argued that the WHR was a more consistent estrogen marker than the Bust–waist ratio (BWR) studied at King's College, London by Dr. Glenn Wilson in the 1970s.
     * 
     * Some researchers have found that the waist-hip ratio (WHR) is a significant measure of female attractiveness. Women with a 0.7 WHR are usually rated as more attractive by men from Indo-European cultures. Preferences may vary, according to some studies, ranging from 0.6 in China, South America, and some of Africa to 0.8 in Cameroon and among the Hazda tribe of Tanzania, with divergent preferences according the ethnicity of the observed being noted.
     * 
     * It appears that men are more influenced by female waist-size than hip-size:
     * 
     * "Hip size indicates pelvic size and the amount of additional fat storage that can be used as a source of energy. Waist size conveys information such as current reproductive status or health status ... in westernized societies with no risk of seasonal lack of food, the waist, conveying information about fecundity and health status, will be more important than hip size for assessing a female's attractiveness." —Journal of Biological Psychology, 
     * 
     * Men find women attractive who have the same WHR as women he has been exposed to. By western standards, women in foraging populations have high numbers of pregnancies, high parasite loads, and high caloric dependence on fibrous foods. These variables change across cultures, suggesting that the normal range of female WHR was often higher than in western cultures, what constituted locally “WHR” varied, and average WHR of nubile females and of females of peak fertility varied.
     * 
     * Thus, a WHR that indicates pubertal onset, sex, fertility, hormonal irregularities, and/or differentiates male from female in one population may not do so in another.
     * 
     * In a series of studies done by Singh (1993), men used WHR and fat distribution to determine a woman’s attractiveness. In his first study, men were shown a series of 12 drawings of women with various WHR’s and body fat distribution. Drawings with normal body fat distribution and a moderate WHR were associated with the most positive traits (i.e. attractive, sexy, intelligent and healthy). The drawings with the low WHR were not associated with any positive traits except youthfulness.
     * 
     * Through this study, Singh suggests that males and females may have developed innate mechanisms which detect and make use of the WHR to assess how healthy an individual is and (particularly for men), infer possible mate value. Having a healthy mate improves the chances of producing offspring with inherited genetic protection from various diseases and a healthy mate is more likely to be a good parent (Hamilton & Zuk, 1982; Thornhill, 1993).
     * 
     * Other studies discovered WHR as a signal of attractiveness as well, beyond just examining body fat and fertility. For example, Barnaby Dixson, Gina Grimshaw, Wayne Linklater, and Alan Dixson conducted a study using eye-tracking techniques to evaluate men's fixation on digitally altered photographs of the same woman, as well as asking the men to evaluate the images based on attractiveness. What they found was while men fixated on the woman's breasts in each photo, they selected the images where the woman had a 0.7 WHR as most attractive, regardless of breast size.
     * 
     * Furthermore, referencing a 2005 study conducted by Johnson and Tassinary looking at animated human walking stimuli, Farid Pazhoohi and James R. Liddle proposed that men do not solely use WHR to evaluate attractiveness, but also a means of sex-differentiation, with higher WHR perceived as more masculine and lower WHR as an indicator of femininity. Pazhoohi and Liddle used this idea as a possible additional explanation as to why men perceive a lower WHR as more attractive - because it relates to an expression of femininity, as opposed to masculinity and a higher WHR.[36] On this basis, it was shown that men with lower, more feminine, WHRs feel less comfortable and self-report lower body esteem and self-efficacy than men with higher, more masculine, WHRs.
     * 
     * To enhance their perceived attractiveness, some women may artificially alter their apparent WHR. The methods include the use of a corset to reduce the waist size and hip and buttock padding to increase the apparent size of the hips and buttocks. In an earlier attempt to quantify attractiveness, corset and girdle manufacturers of the 20th century used a calculation called hip spring (or hip-spring or hipspring), calculated by subtracting the waist measurement from the hip measurement. However this calculation fell into disuse because it is a poor indicator of attractiveness; for example, a hip spring of 10 inches (250 mm) would likely be considered quite attractive for an average-sized adult woman, but a child or petite woman with the same number would more likely be seen as malnourished.
     * 
     * Women in western societies strive for model bodies, not necessarily a curvy, normal body that is reported to be more attractive. WHR versus BMI attractiveness is related to fertility, not fat content. A study performed by Holliday used computer generated female body shapes to construct images which covary with real female body mass (indexed with BMI) and not with body shape (indexed with WHR), and vice versa. Twelve observers (6 male and 6 female) rated these images for attractiveness during an fMRI study. The attractiveness ratings were correlated with changes in BMI and not WHR. The results demonstrated that in addition to activation in higher visual areas, changing BMI also adjusted of the brain reward system. This shows that BMI, not WHR, modulates reward mechanisms in the brain and that this may have important implications for judgements of ideal body size in eating disordered individuals.
     * 
     * Another study, conducted by Furnham, was used as an extension of Singh & Young's (1995) investigation. A total of 137 participants participated in this study, all of whom were British. There were 98 female participants. The age range was between 16 and 67. The majority of participants were undergraduates, and 90% were white British, the remainder being Asian (East Indian) and African. Their educational and socio-economic backgrounds (nearly all middle class) were fairly homogenous, and none of the participants had previously participated in any studies involving female body shape or attractiveness. It was predicted that the effect of breast size on judgment of attractiveness and age estimation will be dependent on overall body fat and the size of the waist-to-hip ratio.
     * 
     * All the participants were given a booklet with eight pictures in total. Each figure was identified as heavy or slender, feminine WHR or masculine WHR, and large breasted or small breasted. The participants rated the figures for four personal attributes (namely attractiveness, healthiness, feminine looking, and kindness/understanding).
     * 
     * When ratings of the figures' attractiveness were being made, generally it appears that their bust size, WHR, and their weight were all important contributory elements. The female participants rated the figures with a low WHR as more attractive, healthy, feminine looking, and in the case of the heavy figure, more kind/understanding than did male participants. This is a particularly interesting finding, as most previous studies report that young women idealize female bodies solely on the basis of thinness. As far as the breast sizes of the slender figures is concerned, whether they had large or small breasts did not appear to have any effect on the ratings of attractiveness or kindness/understanding, and having larger breasts only increased the mean ratings of health and femininity very slightly. However, a heavy figure with a high WHR and a large bust was rated as the least attractive and healthy by all participants.
     * 
     * Waist-Hip Ratio is also a reliable cue to one’s sex and it is hypothesized that the "individuals who represent a mismatch based on the cue provided by WHR (e.g., women with high WHRs or men with low WHRs) would likely be viewed as unattractive by the opposite sex." 
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