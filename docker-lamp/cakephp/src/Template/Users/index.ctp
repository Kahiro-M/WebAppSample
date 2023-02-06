<!-- File: src/Template/Users/index.ctp -->

<div class="users login">
会員ページ
<?php foreach($users as $user){ ?>
    <hr>
    <div><span class="id">id : </span><span><?= $user->id ?></span></div>
    <div><span class="username">username : </span><span><?= $user->username ?></span></div>
    <div><span class="password">password : </span><span><?= $user->password ?></span></div>
    <div><span class="role">role : </span><span><?= $user->role ?></span></div>
    <div><span class="created">created : </span><span><?= $user->created ?></span></div>
    <div><span class="modified">modified : </span><span><?= $user->modified ?></span></div>
<?php } ?>
<pre>
</pre>
</div>