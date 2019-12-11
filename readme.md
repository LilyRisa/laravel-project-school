## API
- [POST] /login | form-data: {email:'text', password: 'text'} | <b>return { token: 'text'}</b>
- [POST] /register form-data: {name: 'text', email:'text', password: 'text', password_validate: 'text'}
- 
### CATEGORY:
- [GET] /category | return list{}
- [GET] /category/{ID} | return item{}
- [POST] /category/create | form-data: {token: 'text', name: 'text', keyword: 'text'} | return {status: int, messenges: 'text'}
- [UPDATE] /category/{ID} | form-data: {token: 'text', name: 'text', keyword: 'text'} | return {status: int, messenges: 'text'}
- [DELETE] /category/{ID} | form-data: {token: 'text'} | return {status: int, messenges: 'text'}
### CATEGORY CHILD:
- [GET] /category_child | return list{}
- [GET] /category_child/{ID} | return item{}
- [POST] /category_child/create | form-data: {token: 'text', name: 'text', keyword: 'text',category_id: int} | return {status: int, messenges: 'text'}
- [UPDATE] /category_child/{ID} | form-data: {token: 'text', name: 'text', keyword: 'text', category_id: int} | return {status: int, messenges: 'text'}
- [DELETE] /category_child/{ID} | form-data: {token: 'text'} | return item{}
### IMAGE :
- [GET] /image/{id} | return {success: <i>path_filename</i>}
- [POST] /image/upload | form-data: {token: 'text', title: 'text', image: <i>image_file</i>} | return {status: int, messenges: 'text'}
### BLOG:
- [GET] /blog | return list{}
- [GET] /blog/{ID} | return item{}
- [POST] /blog/search | form-data: {token: 'text', query: 'text', key: 'text'} | return item{} or list{}
- [POST] /blog/create | form-data: {token: 'text', blog_title: 'text', blog_meta: 'text', blog_body: 'text', user_id: int, category_child_id: int, blog_image: int}
- [UPDATE] blog/update/{id} | form-data: {token: 'text', blog_title: 'text', blog_meta: 'text', blog_body: 'text', user_id: int, category_child_id: int, blog_image: int}
- [DELETE] blog/delete/{id} | return status{}
### UPDATING...
## SETUP WEBSERVER:
- Yêu cầu:
+ đã cài đặt composer, php >= 7.2
- Chạy lệnh sau tại folder``` / ``` 
```
cp .env.example .env
```
- Vào file .env chỉnh sửa lại thông tin connect database, APP_DEBUG = false (Khi public)
- Chạy tiếp các lệnh sau:
```composer update
php artisan migrate
php artisan passport:install
```
- Nếu deploy trên server run ``` php artisan serve ```
- Hosting: https://mydomain/public/ or config root to /public 


C

