<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JSON to CSV Converter</title>
    <link rel="stylesheet" href="/main.css">
</head>
<body>
<h1>JSON to CSV Converter</h1>
<form id="jsonToCsvForm">
    <label for="sourceUrl">JSON Source (URL):</label>
    <input type="text" id="sourceUrl" name="sourceUrl">

    <label for="sourceFile">Or Upload JSON File:</label>
    <input type="file" id="sourceFile" name="sourceFile" accept=".json">

    <label for="fields">Fields to Include (comma separated):</label>
    <input type="text" id="fields" name="fields">

    <label for="delimiter">Field Delimiter:</label>
    <input type="text" id="delimiter" name="delimiter" value=",">

    <label for="enclosure">Text Enclosure:</label>
    <input type="text" id="enclosure" name="enclosure" value="&quot;">

    <button type="submit">Convert</button>
</form>

<script src="/main.js"></script>
</body>
</html>
