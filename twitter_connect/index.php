<?php

require_once(__DIR__ . '/config.php');

$twitterLogin = new MyApp\TwitterLogin();

if ($twitterLogin->isLoggedIn()) {
  $me = $_SESSION['me'];

  $twitter =new MyApp\Twitter($me->tw_access_token, $me->tw_access_token_secret);
  $tweets = $twitter->getTweets();
  $results = $twitter->searchTweets();
  MyApp\Token::create();
}

?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <title>Twitter Connect!</title>
  <style>
  #container {
    width: 500px;
    margin: 0 auto;
  }
  h1 {
    font-size: 18px;
    border-bottom: 1px solid #ccc;
    padding: 3px 0;
  }
  #login {
    text-align: center;
    margin: 70px auto;
  }
  #logout {
    float: right;
  }
  </style>
</head>
<body>
  <div id="container">
    <?php if ($twitterLogin->isLoggedIn()) : ?>

      <form action="logout.php" method="post" id="logout">
          <input type="submit" value="Log Out">
          <input type="hidden" name="token" value="<?= h($_SESSION['token']); ?>">
      </form>

      <h1>@<?= h($me->tw_screen_name); ?>'s Timeline</h1>

      <ul>
        <?php foreach ($tweets as $tweet) : ?>
        <li><?= $tweet->text; ?></li>
        <?php endforeach; ?>
      </ul>

      <ul>
        <?php foreach ($results as $result) : ?>
        <li><?= $result->text; ?></li>
        <?php endforeach; ?>
      </ul>
        
      <?php else : ?>

      <h1>My Timeline</h1>
    <div id="login">
      <a href="login.php"><img src="signin_button.png"></a>
    </div>

      <?php endif; ?>

  </div>
</body>
</html>
