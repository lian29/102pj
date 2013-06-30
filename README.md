##102pj
畢業專題


##git操作

每次修改好了以後，可以先將修改存入stage

`git add "檔名"`

若一次修改大量檔案，可以將所有檔案修改都add進去stage

`git add .`

只加修改過的檔案, 新增的檔案不加入

`git add -u`

之後commit提交一次的修改

`git commit -m "註解"`

另外也可以把git add與git commit用一個指令完成

`git commit -a -m "註解"`

改好了使用

`git push`

如果您在github上的版本較新，也可以輸入git pull
更新本地端的repo

`git pull git://github.com/ken800314/Simple-words.git`

刪除檔案

`git rm "檔名"`



##密碼

密碼緩存
`git config --global credential.helper cache`

默認情況下緩存密碼15分鐘，可以使用以下指令將緩存設置為1小時（以秒為單位設置）
`git config --global credential.helper 'cache --timeout=3600'`


##SSH公鑰

安裝ssh使用下面的指令
sudo apt-get install ssh

##第1步：檢查SSH密鑰
$ CD〜/ SSH 
＃檢查看是否有一個名為"SSH"在你的用戶目錄

