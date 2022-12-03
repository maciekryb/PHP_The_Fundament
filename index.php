<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <title>Demo</title>
</head>

<body>

  <?php
  $books = [
    [
      'name' => 'Do Androids Dream of Electris Shepa',
      'author' => 'Philip K. Dick',
      'purchaseUrl' => 'http://example.com',
      'releaseYear' => '2021'
    ],
    [
      'name' => "Hail Mary",
      'author' => 'Andy Weir',
      'purchaseUrl' => 'http://example2.com',
      'releaseYear' => '201'
    ]
  ];
  ?>

  <p>
    <?php foreach ($books as $book) : ?>

      <li>
        <a href="<?= $book['purchaseUrl'] ?>">
          <?= $book['name'] ?> (<?= $book['releaseYear'] ?>)
        </a>
      </li>
    <?php endforeach ?>
  </p>

</body>

</html>