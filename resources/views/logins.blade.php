<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="./css/reset.css">
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <header></header>
    <main>
        <div class="contain">
            <h1>ログイン</h1>
            <p>{{ $message }}</p>
            <div class="form-div">
                <form method="POST" action="/student">
                    @csrf
                    <p>メールアドレス<input type="email" name="email" placeholder="△△△@×××.co.jp"></p>
                    <p>パスワード<input type="text" name="password" placeholder="パスワードを入力してください"></p>
                    <button type="submit" value="send">ログイン</button>
                </form>
            </div>
            <a href="{{url('registers')}}" class="btn-rg">新規登録</a>
        </div>
    </main>
    <footer></footer>
</body>
</html>