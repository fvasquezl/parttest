<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="/kits" method="post">
    @csrf
    <label for="category_id">category:</label><br>
    <input type="text" id="category_id" name="category_id" value="1"><br>
    <label for="sub_category_id">subcategory:</label><br>
    <input type="text" id="sub_category_id" name="sub_category_id" value="1"><br>
    <label for="name">name:</label><br>
    <input type="text" id="name" name="name" value="uno"><br>
    <input type="submit" value="Submit">
</form>

</body>
</html>
