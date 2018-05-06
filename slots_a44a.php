<?php
include'inc/db.php';

	$img[1] = '	<img src="https://vignette.wikia.nocookie.net/yugioh/images/0/05/DarkMagician-LEDD-EN-C-1E.png/revision/latest/scale-to-width-down/300?cb=20171005213046">';
	$img[2] = '<img src="https://vignette.wikia.nocookie.net/yugioh/images/7/77/BlueEyesWhiteDragon-LCKC-EN-UR-1E.png/revision/latest/scale-to-width-down/300?cb=20180415030139">';
	$img[3] = '<img src="https://vignette.wikia.nocookie.net/yugioh/images/3/3f/BlackLusterSoldier-YGLD-EN-C-1E.png/revision/latest/scale-to-width-down/300?cb=20170812174429">';
	$img[4] = '<img src="https://vignette.wikia.nocookie.net/yugioh/images/8/8c/SlifertheSkyDragon-JMPS-EN-UR-LE.png/revision/latest/scale-to-width-down/300?cb=20170807181627">';
	$img[5] = '<img src="https://vignette.wikia.nocookie.net/yugioh/images/d/d9/ObelisktheTormentor-MVPC-EN-GScR-LE.png/revision/latest/scale-to-width-down/300?cb=20170129144010">';
	$img[6] = '<img src="https://vignette.wikia.nocookie.net/yugioh/images/c/c5/TheWingedDragonofRa-LDK2-EN-UR-LE.png/revision/latest/scale-to-width-down/300?cb=20161007082902">';
	$img[7] = '<img src="https://vignette.wikia.nocookie.net/yugioh/images/1/10/DragonMasterKnight-LCKC-EN-ScR-1E.png/revision/latest/scale-to-width-down/300?cb=20180323170048">'; 
	$img[8] = '<img src="https://vignette.wikia.nocookie.net/yugioh/images/1/15/FiveHeadedDragon-MIL1-EN-C-1E.png/revision/latest/scale-to-width-down/300?cb=20160415070911">';
	$img[9] = '<img src="https://vignette.wikia.nocookie.net/yugioh/images/b/b9/QuintetMagician-VB20-JP-UR.png/revision/latest/scale-to-width-down/300?cb=20180222113338">';
	$img[10] = '<img src="https://vignette.wikia.nocookie.net/yugioh/images/b/bf/HolactietheCreatorofLight-YGOPR-JP-UR.png/revision/latest/scale-to-width-down/300?cb=20150202011901">';
	$img[11] = '<img src="https://vignette.wikia.nocookie.net/yugioh/images/9/99/MagicianofBlackChaos-YGLD-EN-UR-1E.png/revision/latest/scale-to-width-down/300?cb=20170814145706">';
	$img[12] = '<img src="https://vignette.wikia.nocookie.net/yugioh/images/8/86/BlueEyesShiningDragon-LCKC-EN-ScR-1E.png/revision/latest/scale-to-width-down/300?cb=20180323155542">';
	$img[13] = '<img src="https://vignette.wikia.nocookie.net/yugioh/images/0/05/DarkMagician-LEDD-EN-C-1E.png/revision/latest/scale-to-width-down/300?cb=20171005213046">';
	$img[14] = '<img src="https://vignette.wikia.nocookie.net/yugioh/images/7/77/BlueEyesWhiteDragon-LCKC-EN-UR-1E.png/revision/latest/scale-to-width-down/300?cb=20180415030139">';
	$img[15] = '<img src="https://vignette.wikia.nocookie.net/yugioh/images/3/3f/BlackLusterSoldier-YGLD-EN-C-1E.png/revision/latest/scale-to-width-down/300?cb=20170812174429">';
	$img[16] = '<img src="https://vignette.wikia.nocookie.net/yugioh/images/8/8c/SlifertheSkyDragon-JMPS-EN-UR-LE.png/revision/latest/scale-to-width-down/300?cb=20170807181627">';
	$img[17] = '<img src="https://vignette.wikia.nocookie.net/yugioh/images/d/d9/ObelisktheTormentor-MVPC-EN-GScR-LE.png/revision/latest/scale-to-width-down/300?cb=20170129144010">';
	$img[18] = '<img src="https://vignette.wikia.nocookie.net/yugioh/images/c/c5/TheWingedDragonofRa-LDK2-EN-UR-LE.png/revision/latest/scale-to-width-down/300?cb=20161007082902">';
	$img[19] = '<img src="https://vignette.wikia.nocookie.net/yugioh/images/1/10/DragonMasterKnight-LCKC-EN-ScR-1E.png/revision/latest/scale-to-width-down/300?cb=20180323170048">'; 
	$img[20] = '<img src="https://vignette.wikia.nocookie.net/yugioh/images/1/15/FiveHeadedDragon-MIL1-EN-C-1E.png/revision/latest/scale-to-width-down/300?cb=20160415070911">';
	$img[21] = '<img src="https://vignette.wikia.nocookie.net/yugioh/images/b/b9/QuintetMagician-VB20-JP-UR.png/revision/latest/scale-to-width-down/300?cb=20180222113338">';
	$img[22] = '<img src="https://vignette.wikia.nocookie.net/yugioh/images/b/bf/HolactietheCreatorofLight-YGOPR-JP-UR.png/revision/latest/scale-to-width-down/300?cb=20150202011901">';
	$img[23] = '<img src="https://vignette.wikia.nocookie.net/yugioh/images/9/99/MagicianofBlackChaos-YGLD-EN-UR-1E.png/revision/latest/scale-to-width-down/300?cb=20170814145706">';
	$img[24] = '<img src="https://vignette.wikia.nocookie.net/yugioh/images/8/86/BlueEyesShiningDragon-LCKC-EN-ScR-1E.png/revision/latest/scale-to-width-down/300?cb=20180323155542">';

	$ran1 = rand(1,24);
	$ran2 = rand(1,24);
	$ran3 = rand(1,24);
	if($ran1 == $ran2 && $ran1 == $ran3 ) {
		$cost = rand(10,20);	
		$sql = "UPDATE users SET coins = $cost WHERE id = :id";
		$stmt = $conn->prepare("UPDATE users SET coins = $cost WHERE id = :id");
		$stmt->bind_param(":coins", $coins);
		$stmt->$conn->prepare($sql);
		$stmt->execute();
        echo $stmt->rowCount() . " coins UPDATED";
		echo "<table align=center><tr><td>";
		echo $img[$ran1];
		echo "</td><td>";
		echo $img[$ran2];
		echo "</td><td>";
		echo $img[$ran3];
		echo "</td></tr></table>";
		echo "<div style='float:center;' class='alert alert-success' role='success' align='center'>You just won $cost minigame point(s)!</div>";
	} else {
		echo "<table align=center><tr><td>";
		echo $img[$ran1];
		echo "</td><td>";
		echo $img[$ran2];
		echo "</td><td>";
		echo $img[$ran3];
		echo "</td></tr></table>";
		echo '<div style="float:center;" class="alert alert-danger" role="danger" align="center">You lost please try again!</div>';
	
	}

?>