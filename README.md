# CSRF Checker

トークンを利用して、CSRF対策を行なうためのシンプルなライブラリです。
dietcakeでの利用を想定しています。

# how to use

Viewでtokenをセットし、formデータ送信先のControllerで検証します。

## View

```php
<form method="post" action="/user/delete">
  <?php CSRFChecker::generateTokenTag(); ?>
  <input type="submit" value="Delete" />
</form>
```

## Controller

```php
<?php
class User extends AppController
{
    public function delete()
    {
        if (!CSRFChecker::is_safe()) {
            throw new SecurityException('Invalid Request');
        }
    }
}
```

# その他メモ、TODO

- composer対応
- クラス名やメソッド名はこれでいいのか…?
