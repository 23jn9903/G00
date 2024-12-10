<?php
// サンプルデータ（都道府県と市区町村の連想配列）
$prefecture_cities = [
    '東京都' => ['新宿区', '渋谷区', '品川区', '港区'],
    '神奈川県' => ['横浜市', '川崎市', '相模原市', '藤沢市'],
    '埼玉県' => ['さいたま市', '川越市', '所沢市', '越谷市']
];
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>動的ドロップダウン</title>
</head>
<body>
    <div>
        <select id="prefecture" onchange="updateCities()">
            <option value="">都道府県を選択</option>
            <?php foreach(array_keys($prefecture_cities) as $pref): ?>
                <option value="<?php echo htmlspecialchars($pref); ?>">
                    <?php echo htmlspecialchars($pref); ?>
                </option>
            <?php endforeach; ?>
        </select>

        <select id="city">
            <option value="">市区町村を選択</option>
        </select>
    </div>

    <script>
        // PHPの連想配列をJavaScriptオブジェクトとして保持
        const prefectureCities = <?php echo json_encode($prefecture_cities, JSON_UNESCAPED_UNICODE); ?>;

        function updateCities() {
            const prefSelect = document.getElementById('prefecture');
            const citySelect = document.getElementById('city');
            const selectedPref = prefSelect.value;

            // 市区町村のドロップダウンをクリア
            citySelect.innerHTML = '<option value="">市区町村を選択</option>';

            // 都道府県が選択されている場合
            if (selectedPref && prefectureCities[selectedPref]) {
                prefectureCities[selectedPref].forEach(city => {
                    const option = document.createElement('option');
                    option.value = city;
                    option.textContent = city;
                    citySelect.appendChild(option);
                });
            }
        }
    </script>
</body>
</html>