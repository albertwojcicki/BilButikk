$session = New-Object Microsoft.PowerShell.Commands.WebRequestSession
$session.UserAgent = "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36 OPR/112.0.0.0 (Edition std-1)"
$session.Cookies.Add((New-Object System.Net.Cookie("guid", "eec3767a-c356-48de-adf1-bed34bea0a4f", "/", "localhost")))
Invoke-WebRequest -UseBasicParsing -Uri "http://localhost/ny%20bil/admin.php" `
-Method "POST" `
-WebSession $session `
-Headers @{
"Accept"="text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.7"
  "Accept-Encoding"="gzip, deflate, br, zstd"
  "Accept-Language"="en-US,en;q=0.9"
  "Cache-Control"="max-age=0"
  "Origin"="http://localhost"
  "Referer"="http://localhost/ny%20bil/admin.php"
  "Sec-Fetch-Dest"="document"
  "Sec-Fetch-Mode"="navigate"
  "Sec-Fetch-Site"="same-origin"
  "Sec-Fetch-User"="?1"
  "Upgrade-Insecure-Requests"="1"
  "sec-ch-ua"="`"Not/A)Brand`";v=`"8`", `"Chromium`";v=`"126`", `"Opera GX`";v=`"112`""
  "sec-ch-ua-mobile"="?0"
  "sec-ch-ua-platform"="`"Windows`""
} `
-ContentType "multipart/form-data; boundary=----WebKitFormBoundary2tpKeByBXCsGllWK" `
-Body ([System.Text.Encoding]::UTF8.GetBytes("------WebKitFormBoundary2tpKeByBXCsGllWK$([char]13)$([char]10)Content-Disposition: form-data; name=`"car_name`"$([char]13)$([char]10)$([char]13)$([char]10)bmw$([char]13)$([char]10)------WebKitFormBoundary2tpKeByBXCsGllWK$([char]13)$([char]10)Content-Disposition: form-data; name=`"car_price`"$([char]13)$([char]10)$([char]13)$([char]10)100 000kr$([char]13)$([char]10)------WebKitFormBoundary2tpKeByBXCsGllWK$([char]13)$([char]10)Content-Disposition: form-data; name=`"car_brand`"$([char]13)$([char]10)$([char]13)$([char]10)Audi$([char]13)$([char]10)------WebKitFormBoundary2tpKeByBXCsGllWK$([char]13)$([char]10)Content-Disposition: form-data; name=`"car_text`"$([char]13)$([char]10)$([char]13)$([char]10)wef$([char]13)$([char]10)------WebKitFormBoundary2tpKeByBXCsGllWK$([char]13)$([char]10)Content-Disposition: form-data; name=`"car_image1`"; filename=`"normal.jpg`"$([char]13)$([char]10)Content-Type: image/jpeg$([char]13)$([char]10)$([char]13)$([char]10)$([char]13)$([char]10)------WebKitFormBoundary2tpKeByBXCsGllWK$([char]13)$([char]10)Content-Disposition: form-data; name=`"car_image2`"; filename=`"normal.jpg`"$([char]13)$([char]10)Content-Type: image/jpeg$([char]13)$([char]10)$([char]13)$([char]10)$([char]13)$([char]10)------WebKitFormBoundary2tpKeByBXCsGllWK$([char]13)$([char]10)Content-Disposition: form-data; name=`"car_image3`"; filename=`"download.jpg`"$([char]13)$([char]10)Content-Type: image/jpeg$([char]13)$([char]10)$([char]13)$([char]10)$([char]13)$([char]10)------WebKitFormBoundary2tpKeByBXCsGllWK$([char]13)$([char]10)Content-Disposition: form-data; name=`"car_image4`"; filename=`"`"$([char]13)$([char]10)Content-Type: application/octet-stream$([char]13)$([char]10)$([char]13)$([char]10)$([char]13)$([char]10)------WebKitFormBoundary2tpKeByBXCsGllWK$([char]13)$([char]10)Content-Disposition: form-data; name=`"car_image5`"; filename=`"`"$([char]13)$([char]10)Content-Type: application/octet-stream$([char]13)$([char]10)$([char]13)$([char]10)$([char]13)$([char]10)------WebKitFormBoundary2tpKeByBXCsGllWK$([char]13)$([char]10)Content-Disposition: form-data; name=`"car_image6`"; filename=`"`"$([char]13)$([char]10)Content-Type: application/octet-stream$([char]13)$([char]10)$([char]13)$([char]10)$([char]13)$([char]10)------WebKitFormBoundary2tpKeByBXCsGllWK$([char]13)$([char]10)Content-Disposition: form-data; name=`"car_image7`"; filename=`"`"$([char]13)$([char]10)Content-Type: application/octet-stream$([char]13)$([char]10)$([char]13)$([char]10)$([char]13)$([char]10)------WebKitFormBoundary2tpKeByBXCsGllWK$([char]13)$([char]10)Content-Disposition: form-data; name=`"car_image8`"; filename=`"`"$([char]13)$([char]10)Content-Type: application/octet-stream$([char]13)$([char]10)$([char]13)$([char]10)$([char]13)$([char]10)------WebKitFormBoundary2tpKeByBXCsGllWK$([char]13)$([char]10)Content-Disposition: form-data; name=`"car_image9`"; filename=`"`"$([char]13)$([char]10)Content-Type: application/octet-stream$([char]13)$([char]10)$([char]13)$([char]10)$([char]13)$([char]10)------WebKitFormBoundary2tpKeByBXCsGllWK$([char]13)$([char]10)Content-Disposition: form-data; name=`"car_image10`"; filename=`"`"$([char]13)$([char]10)Content-Type: application/octet-stream$([char]13)$([char]10)$([char]13)$([char]10)$([char]13)$([char]10)------WebKitFormBoundary2tpKeByBXCsGllWK$([char]13)$([char]10)Content-Disposition: form-data; name=`"car_stand`"$([char]13)$([char]10)$([char]13)$([char]10)Brukt$([char]13)$([char]10)------WebKitFormBoundary2tpKeByBXCsGllWK$([char]13)$([char]10)Content-Disposition: form-data; name=`"car_year`"$([char]13)$([char]10)$([char]13)$([char]10)2021$([char]13)$([char]10)------WebKitFormBoundary2tpKeByBXCsGllWK$([char]13)$([char]10)Content-Disposition: form-data; name=`"car_km`"$([char]13)$([char]10)$([char]13)$([char]10)1$([char]13)$([char]10)------WebKitFormBoundary2tpKeByBXCsGllWK$([char]13)$([char]10)Content-Disposition: form-data; name=`"car_gearbox`"$([char]13)$([char]10)$([char]13)$([char]10)Manuell$([char]13)$([char]10)------WebKitFormBoundary2tpKeByBXCsGllWK$([char]13)$([char]10)Content-Disposition: form-data; name=`"car_fuel`"$([char]13)$([char]10)$([char]13)$([char]10)EL$([char]13)$([char]10)------WebKitFormBoundary2tpKeByBXCsGllWK$([char]13)$([char]10)Content-Disposition: form-data; name=`"car_power`"$([char]13)$([char]10)$([char]13)$([char]10)100$([char]13)$([char]10)------WebKitFormBoundary2tpKeByBXCsGllWK$([char]13)$([char]10)Content-Disposition: form-data; name=`"car_seats`"$([char]13)$([char]10)$([char]13)$([char]10)4$([char]13)$([char]10)------WebKitFormBoundary2tpKeByBXCsGllWK$([char]13)$([char]10)Content-Disposition: form-data; name=`"car_owners`"$([char]13)$([char]10)$([char]13)$([char]10)1$([char]13)$([char]10)------WebKitFormBoundary2tpKeByBXCsGllWK$([char]13)$([char]10)Content-Disposition: form-data; name=`"car_wheeldrive`"$([char]13)$([char]10)$([char]13)$([char]10)Firehjuls$([char]13)$([char]10)------WebKitFormBoundary2tpKeByBXCsGllWK$([char]13)$([char]10)Content-Disposition: form-data; name=`"car_range`"$([char]13)$([char]10)$([char]13)$([char]10)1$([char]13)$([char]10)------WebKitFormBoundary2tpKeByBXCsGllWK$([char]13)$([char]10)Content-Disposition: form-data; name=`"car_color`"$([char]13)$([char]10)$([char]13)$([char]10)se bildet$([char]13)$([char]10)------WebKitFormBoundary2tpKeByBXCsGllWK$([char]13)$([char]10)Content-Disposition: form-data; name=`"car_last_eu_control`"$([char]13)$([char]10)$([char]13)$([char]10)2024-08-20$([char]13)$([char]10)------WebKitFormBoundary2tpKeByBXCsGllWK$([char]13)$([char]10)Content-Disposition: form-data; name=`"car_next_eu_control`"$([char]13)$([char]10)$([char]13)$([char]10)2024-08-07$([char]13)$([char]10)------WebKitFormBoundary2tpKeByBXCsGllWK$([char]13)$([char]10)Content-Disposition: form-data; name=`"car_weight`"$([char]13)$([char]10)$([char]13)$([char]10)1$([char]13)$([char]10)------WebKitFormBoundary2tpKeByBXCsGllWK$([char]13)$([char]10)Content-Disposition: form-data; name=`"car_of_the_week`"$([char]13)$([char]10)$([char]13)$([char]10)1$([char]13)$([char]10)------WebKitFormBoundary2tpKeByBXCsGllWK--$([char]13)$([char]10)"));
Invoke-WebRequest -UseBasicParsing -Uri "data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxNiIgaGVpZ2h0PSIxNSIgdmlld0JveD0iMCAwIDI0IDI0Ij48cGF0aCBmaWxsPSJXaW5kb3dUZXh0IiBkPSJNMjAgM2gtMVYxaC0ydjJIN1YxSDV2Mkg0Yy0xLjEgMC0yIC45LTIgMnYxNmMwIDEuMS45IDIgMiAyaDE2YzEuMSAwIDItLjkgMi0yVjVjMC0xLjEtLjktMi0yLTJ6bTAgMThINFY4aDE2djEzeiIvPjxwYXRoIGZpbGw9Im5vbmUiIGQ9Ik0wIDBoMjR2MjRIMHoiLz48L3N2Zz4=" -Headers @{
"Referer"=""
}