<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>管理ユーザー登録画面</title>
    <link rel="stylesheet" href="./css/reset.css">
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
<header></header>
    <main>
        <div class="contain">
        <h1>管理ユーザー登録画面</h1>
            <div class="form-div">
                <form action="">
                    <p>ユーザ名<input type="text" name="name" placeholder="ID名"></p>
                    <p>メールアドレス<input type="email" name="email" placeholder="△△△@×××.co.jp"></p>
                    <p>パスワード<input type="text" name="password" placeholder="パスワードを入力してください"></p>
                    <p>パスワード確認用<input type="text" name="password" placeholder="パスワードを再度入力してください"></p>
                    <button type="submit" value="send">登録</button>
                </form>
            </div>
            <a href="{{url('login')}}" class="btn-rg">戻る</a>
        </div>
    </main>
    <footer></footer>
</body>
</html>