# RULES — Quy tắc kiến trúc, công nghệ và phạm vi triển khai

> **Dự án:** Computer Store — Website công ty kinh doanh máy tính & linh kiện  
> **Môn:** Lập trình Web, HK1 2026–2027  
> **Phiên bản:** 1.0 | **Ngày:** 14/10/2026  
> **Trạng thái:** Baseline quy tắc triển khai cho toàn nhóm  
> **Tài liệu liên quan:** [`spec.md`](./spec.md), `assignment.pdf`

## 0. Mục đích và thứ tự ưu tiên

Tài liệu này là **guardrails** cho việc thiết kế, viết code, review và tích hợp, giúp nhóm hoàn thành bài tập lớn mà không mở rộng phạm vi hoặc chọn công nghệ sai quy định.

**Thứ tự ưu tiên khi có mâu thuẫn:**

1. **[BT] `assignment.pdf`:** yêu cầu và điều cấm chính thức của giảng viên; không được tự ý nới lỏng.
2. **[SRS] `spec.md`:** baseline yêu cầu chức năng, quy tắc nghiệp vụ, nghiệm thu đã mô tả.
3. **[RULE] `rules.md`:** quyết định kỹ thuật, boundary và cách triển khai của nhóm.
4. **[MR] Đề xuất mở rộng:** chỉ thực hiện nếu P0 hoàn tất và nhóm chấp thuận.

Nếu tài liệu không thống nhất, **dừng thực hiện phần xung đột**, đối chiếu `assignment.pdf`, cập nhật `spec.md` và `rules.md` trong cùng pull request. Không biến lựa chọn kỹ thuật của nhóm thành “quy định của giảng viên”.

**Từ khóa quy phạm:** **MUST** = bắt buộc; **MUST NOT** = cấm; **SHOULD** = nên; **MAY** = tùy chọn.

---

## 1. Ràng buộc bắt buộc từ đề bài [BT]

| ID | Quy tắc không được vi phạm |
|---|---|
| BT-01 | **MUST** sử dụng HTML5, CSS3, JavaScript cho giao diện; **PHP >= 7.0 là ngôn ngữ duy nhất xử lý phía server**; database dùng **MySQL**. |
| BT-02 | **MUST NOT** sử dụng bất kỳ **PHP Framework, CMF, CMS** nào. Đặc biệt không dùng Laravel, Symfony, CodeIgniter, CakePHP, WordPress, Magento, OpenCart hoặc framework backend khác. |
| BT-03 | **MAY** tự viết kiến trúc MVC; **MAY** sử dụng CSS/JavaScript framework và thư viện frontend. |
| BT-04 | **MUST** triển khai các vai trò Guest, Member và Admin với các chức năng tương ứng trong `spec.md`. |
| BT-05 | **MUST** dùng **TailAdmin Free Dashboard template** cho phần quản trị (phiên bản/tài nguyên phù hợp để tích hợp). |
| BT-06 | **MUST** kiểm tra dữ liệu mọi form ở cả **JavaScript (client)** lẫn **PHP (server)**. |
| BT-07 | **MUST** có phân trang cho danh sách dài và các trang quản trị có danh sách. |
| BT-08 | **MUST** upload hình ảnh lên server; **MUST NOT** hotlink URL hình bên ngoài để thay cho chức năng upload yêu cầu. |
| BT-09 | **MUST** responsive; kiểm tra HTML/CSS theo W3C; thử trên trình duyệt phổ biến. |
| BT-10 | **MUST** tìm hiểu và áp dụng bảo mật ứng dụng web và SEO cơ bản. |
| BT-11 | Nhóm tối đa 4 thành viên; phần chung tất cả đều tham gia, 4 phần việc riêng **không trùng nhau**. |
| BT-12 | Lần nộp 1 phải có mã nguồn giao diện HTML/CSS/JS; lần nộp 2 có demo, mã nguồn, dữ liệu MySQL, hướng dẫn cài đặt và báo cáo **tối thiểu 20 trang**. |
| BT-13 | **MUST** tự triển khai mã nguồn, **MUST NOT** sao chép toàn bộ website khác. |

> Một số chức năng như COD, giỏ Guest theo session, tính tồn kho và quy tắc trạng thái đơn là lựa chọn **[SRS]/[RULE] của nhóm**, không phải bắt buộc nguyên văn từ đề bài.

---

## 2. Tech stack đã chốt [RULE]

| Thành phần | Chọn sử dụng | Mức | Giới hạn |
|---|---|---|---|
| Backend | **PHP 8.3, PHP thuần + OOP** | MUST | Chỉ PHP xử lý server; không PHP Framework. PHP 8.3 là chuẩn nội bộ, cao hơn mức tối thiểu của đề. |
| Rendering | **Server-rendered PHP Views** | MUST | HTML xuất từ PHP; JS nâng cao tương tác qua Fetch API khi cần. |
| Frontend | **HTML5, CSS3, JavaScript ES6+** | MUST | Ưu tiên semantic HTML, không phụ thuộc JS cho nội dung SEO cốt lõi. |
| UI public | **Bootstrap 5** + CSS tùy chỉnh | SHOULD | Có thể dùng CSS thuần; không trộn nhiều hệ UI nếu không cần. |
| UI admin | **TailAdmin Free** | MUST | Kiểm tra bản miễn phí, điều kiện sử dụng và khả năng tích hợp với PHP Views trước khi chốt asset/build. |
| Database | **MySQL 8.x, InnoDB, utf8mb4** | MUST | Schema/migration bằng SQL do nhóm tự viết. |
| Data access | **PDO MySQL** | MUST | Prepared statement; transaction cho thao tác đa bảng. |
| Authentication | **PHP Session + RBAC** | MUST | Không tự phát triển JWT nếu không có lý do đủ mạnh. |
| Dependency management | **Composer (PSR-4 autoload)** | SHOULD | Chỉ autoload và thư viện độc lập phù hợp quy định; không cài framework PHP. |
| Web server | **Apache + mod_rewrite** | SHOULD | Document root trỏ tới `public/`; không public thư mục `app/`, `config/`, `vendor/`. |
| Dev environment | Git + GitHub; VS Code; MySQL Workbench hoặc phpMyAdmin | SHOULD | Docker Compose tùy chọn, phải có cách chạy local rõ ràng. |
| HTTP async | Native **Fetch API** | SHOULD | Không cần Axios nếu Fetch đáp ứng đủ. |
| Optional frontend | SweetAlert2, Chart.js, TinyMCE Community, icon library | MAY | Chỉ thêm khi có feature sử dụng; kiểm tra giấy phép và sanitize rich text. |

**Cấm theo baseline nội bộ:** React/Next.js/Vue SPA làm kiến trúc chính, SSR trên Node.js, microservices, GraphQL, event broker, Redis, ORM framework, xây framework tổng quát hoặc tạo API tách riêng không cần thiết. Đây là lựa chọn giới hạn phạm vi **[RULE]**, không phải tuyên bố các JavaScript framework bị giảng viên cấm.

**Không dùng** Node.js/Express/NestJS, ASP.NET, Django, Spring Boot cho nghiệp vụ server; Node có thể xuất hiện **chỉ như công cụ build asset frontend nếu cần**, không phục vụ request backend ở runtime.

---

## 3. Phạm vi hệ thống và giới hạn nghiệp vụ

### 3.1. MVP — MUST implement (P0)

1. **Public company pages:** Home, About, Services/Pricing, Contact, FAQ.
2. **Identity:** đăng ký, đăng nhập/đăng xuất, RBAC, hồ sơ cá nhân, đổi mật khẩu, avatar; Admin quản lý user, khóa/mở khóa và reset mật khẩu an toàn.
3. **Catalog:** danh mục, danh sách/chi tiết sản phẩm, tìm kiếm từ khóa, phân trang; Admin CRUD sản phẩm/danh mục, giá, tồn kho, upload ảnh.
4. **Sales:** giỏ hàng, checkout **COD**, tạo đơn, lịch sử đơn của Member; Admin xem/cập nhật trạng thái đơn và dữ liệu giỏ theo phạm vi hợp lý.
5. **Editorial:** danh sách/chi tiết tin tức, tìm kiếm, phân trang, bình luận; Admin CRUD bài viết, SEO metadata, duyệt/ẩn/xóa bình luận.
6. **Customer care:** gửi liên hệ, quản lý trạng thái liên hệ; FAQ và CRUD FAQ.
7. **Cross-cutting:** PHP/MySQL, TailAdmin Free, responsive, validation hai phía, pagination, local image upload, security, SEO, W3C và kiểm thử trình duyệt.

### 3.2. P1 — SHOULD, sau P0

- Bộ lọc sản phẩm theo danh mục/giá; sắp xếp theo giá/ngày thêm.
- Đồng bộ giỏ Guest từ session sang giỏ Member khi đăng nhập.
- Empty/loading state và giao diện lỗi nâng cao; chỉnh UX trên mobile.

### 3.3. P2 — MAY, chỉ khi được duyệt

- Product Comparison; PC Builder kiểm tra tương thích cơ bản; wishlist; đánh giá sao; biểu đồ dashboard nâng cao.

### 3.4. Ngoài phạm vi — MUST NOT đưa vào MVP

- Marketplace nhiều người bán, thanh toán online thực, tích hợp vận chuyển thật, ERP, nhiều kho/chi nhánh, chatbot AI, quản lý bảo hành phức tạp.
- Thanh toán thu thập thẻ/tài khoản ngân hàng hoặc lưu thông tin thanh toán nhạy cảm.
- Xây tính năng P2 nếu phần P0 còn thiếu, chưa được test hoặc chưa thể demo trọn flow.

**Quy tắc thay đổi phạm vi:** mọi yêu cầu mới cần có ID, nguồn `[BT]/[SRS]/[MR]`, module sở hữu, độ ưu tiên, acceptance criteria và người phụ trách trước khi code.

---

## 4. Bounded Contexts (ranh giới nghiệp vụ)

> Với quy mô assignment, **Bounded Context** là ranh giới logic **trong một Modular Monolith duy nhất**, không phải microservice, app riêng hay database riêng. Tất cả dùng cùng MySQL nhưng **mỗi module chỉ sở hữu bảng/logic của mình**.

| Context | Modules / owner | Phạm vi được phép quản lý | Dữ liệu sở hữu |
|---|---|---|---|
| **Identity & Access** | `Auth`, `User` | Đăng ký/đăng nhập, session, quyền, hồ sơ, mật khẩu, avatar, trạng thái user | `users` |
| **Company Content** | `Site` | Home, About, thông tin doanh nghiệp, banner/logo, dịch vụ và bảng giá | `pages`, `site_settings`, `services` |
| **Customer Communication** | `Contact`, `Faq` | Form liên hệ, xử lý liên hệ, FAQ | `contacts`, `faqs` |
| **Product Catalog** | `Product` | Danh mục, sản phẩm, ảnh, giá niêm yết, tồn kho | `categories`, `products`, `product_images` |
| **Sales** | `Cart`, `Order` | Giỏ Guest/Member, checkout COD, đơn hàng, trạng thái, snapshot giá/tên | `carts`, `cart_items`, `orders`, `order_items` |
| **Editorial** | `Article`, `Comment` | Tin tức, SEO bài viết, bình luận và kiểm duyệt | `articles`, `comments` |

**Không tạo `Admin` thành domain context riêng.** Admin là **giao diện và tập use case với quyền quản trị** trên các context trên. `Core`, `Middleware`, `Support`, `resources/views/layouts` là **technical shared infrastructure**, không phải một nghiệp vụ/bounded context.

### 4.1. Dependency / communication rules — MUST

- `Controller -> Service -> Repository -> PDO` theo hướng một chiều; **View không gọi Repository, không chứa SQL hay business logic**.
- **Mỗi context ghi (`INSERT/UPDATE/DELETE`) vào bảng mình sở hữu**; context khác không được cập nhật trực tiếp qua SQL.
- Controller của context A không import Repository của context B; dùng **public Service interface / application service** của B khi cần.
- **Sales cần Catalog:** đọc thông tin sản phẩm/giá và xác nhận tồn kho qua API nội bộ/service hợp đồng rõ ràng. Việc **trừ/hoàn tồn kho thuộc Catalog**, được Sales điều phối **trong cùng MySQL transaction** (cùng PDO/connection). Không tách transaction ra HTTP hay queue.
- **Sales cần Identity:** lấy `user_id` tin cậy từ session do server kiểm tra; không tin `user_id` do client gửi.
- **Editorial cần Identity:** xác định tác giả bình luận từ session, lưu `user_id`; chỉ truy vấn thông tin user qua Identity service khi cần.
- **Site Home** được phép dùng **read-only queries qua service** của Catalog/Editorial để hiển thị sản phẩm nổi bật/tin mới; không sao chép dữ liệu sở hữu.
- Foreign key giữa context được phép để đảm bảo tính toàn vẹn DB, nhưng **không suy ra quyền sở hữu dữ liệu**.
- Không tạo circular dependency `Catalog <-> Sales` ở service: checkout do Sales điều phối; Catalog cung cấp thao tác tồn kho; Catalog không gọi Sales.
- Các helper kỹ thuật chung chỉ chứa chức năng tổng quát: `Validator`, `Csrf`, `Paginator`, `Uploader`, `Request`, `Response`, `Database`, `View`, `Router`. **Không** chứa business rule riêng của sản phẩm/đơn hàng.

### 4.2. Integration contracts tối thiểu

| Nhu cầu | Bên yêu cầu -> bên cung cấp | Contract gợi ý |
|---|---|---|
| Home hiển thị sản phẩm nổi bật | Site -> Catalog | `ProductQueryService::getFeatured($limit)` |
| Home hiển thị tin mới | Site -> Editorial | `ArticleQueryService::getLatestPublished($limit)` |
| Giỏ lấy thông tin giá/khả dụng | Sales -> Catalog | `ProductQueryService::getPurchasableProducts($ids)` |
| Checkout kiểm tra và cập nhật tồn kho | Sales -> Catalog | `InventoryService::reserveForOrder($items, $pdo)` (trong transaction, khóa hàng theo thứ tự nhất quán) |
| Hủy đơn hoàn kho | Sales -> Catalog | `InventoryService::restoreForCancelledOrder($items, $pdo)` (đảm bảo idempotency) |
| Gắn đơn hàng/bình luận với user | Sales/Editorial -> Identity | `AuthenticatedUser::id()` (lấy từ session đã xác thực) |

*Các tên class/method là hợp đồng đề xuất, nhóm có thể điều chỉnh nhưng **không phá boundary**. Trong ứng dụng một database, dùng connection/transaction do Sales điều phối để đảm bảo atomicity.*

### 4.3. Phạm vi sở hữu theo đầu việc assignment

| Đầu việc | Public pages | Admin capabilities | Context liên quan |
|---|---|---|---|
| **#1** | Home, Contact | Quản trị Home/thông tin doanh nghiệp, liên hệ | Company Content + Customer Communication |
| **#2** | About, FAQ | Quản trị About, FAQ | Company Content + Customer Communication |
| **#3** | Product List, Product Details, Cart | CRUD Products, quản lý Cart/Orders | Catalog + Sales |
| **#4** | News List, Article Details | CRUD News, quản trị bình luận | Editorial |
| **Phần chung** | Login/Register, Profile, template | Quản lý User, quyền, kiến trúc, database, tích hợp | Identity + Shared Infrastructure |

Do #1 và #2 cùng làm trong `Site` / `Contact` / `Faq`, **phân quyền sở hữu theo tính năng/file/route** khi tạo task; không cho hai người cùng sửa một file lớn mà không thống nhất. Dùng code review và integration branch để xử lý phần dùng chung.

---

## 5. Architectural rules và pattern

### 5.1. Kiến trúc áp dụng — MUST / SHOULD

- **MUST:** **Modular Monolith** trong một codebase PHP, một deployable application, một MySQL database.
- **MUST:** **MVC tự viết**: `Router -> Middleware -> Controller -> [Service] -> Repository/PDO -> View/Response`.
- **SHOULD:** **Service Layer** cho use case có business rule (checkout, auth, quản lý đơn); **Repository Pattern** cho truy xuất SQL có độ phức tạp hoặc dùng chung.
- **SHOULD:** **Dependency Injection bằng constructor**; wiring thủ công tại bootstrap/factory. Không viết DI container/framework riêng.
- **SHOULD:** **Post/Redirect/Get (PRG)** cho form thay đổi dữ liệu, tránh submit lặp khi refresh.
- **SHOULD:** **DTO/validated array** cho input nghiệp vụ phức tạp; không tạo mapper/abstraction nếu chỉ phục vụ một thao tác đơn giản.
- **MAY:** interface tại boundary cần thay thế/test; không bắt buộc interface cho mọi class.

### 5.2. Những pattern không nên áp dụng trong MVP

**Không dùng** CQRS phức tạp, Event Sourcing, DDD tactical đầy đủ, Unit of Work tự xây, Generic Repository áp cho mọi bảng, Mediator/Event Bus, plugin architecture, microservices hoặc hệ thống cache phân tán. Các pattern này tăng chi phí mà không phục vụ trực tiếp yêu cầu bài tập.

### 5.3. Quy tắc từng lớp

| Layer | Được làm | Không được làm |
|---|---|---|
| Router | Map HTTP method + path, middleware, param | SQL, business rule |
| Middleware | Auth, role, CSRF, kiểm tra quyền | Render nghiệp vụ, gọi SQL tùy tiện |
| Controller | Nhận request đã parse, gọi service, tạo response | Chứa SQL; xử lý transaction nghiệp vụ dài |
| Service | Business rules, orchestration, transaction, gọi repository | Render HTML; tin giá hoặc `user_id` từ client |
| Repository | PDO, truy vấn và mapping dữ liệu | Echo HTML; quyết định quyền truy cập người dùng |
| View | HTML escape, presentation, form, layout | SQL, kiểm tra quyền thay cho server, thay đổi DB |
| JS | UX, client validation, Fetch, hiển thị phản hồi | Là nguồn xác thực cuối cùng cho dữ liệu/giá/quyền |

---

## 6. Source skeleton và convention

```text
computer-store/
├── app/
│   ├── Core/                   # Router, Request, Response, Database, View, Validator
│   ├── Middleware/             # Auth, Role, Csrf
│   ├── Modules/
│   │   ├── Auth/               # Identity & Access
│   │   ├── User/
│   │   ├── Site/               # Company Content
│   │   ├── Contact/            # Customer Communication
│   │   ├── Faq/
│   │   ├── Product/            # Product Catalog
│   │   ├── Cart/               # Sales
│   │   ├── Order/
│   │   ├── Article/            # Editorial
│   │   └── Comment/
│   └── Support/                # Csrf, FileUploader, Paginator, helpers kỹ thuật
├── config/                     # app.php, database.php
├── database/
│   ├── migrations/             # SQL DDL theo thứ tự
│   └── seeders/                # dữ liệu giả lập
├── resources/views/
│   ├── layouts/                # public.php, member.php, admin.php
│   ├── partials/
│   ├── public/
│   ├── auth/
│   ├── member/
│   └── admin/
├── public/
│   ├── index.php               # single front controller
│   ├── .htaccess
│   ├── assets/{css,js,images}/
│   └── uploads/{products,articles,avatars,site}/
├── routes/web.php
├── tests/
├── composer.json
├── .env.example
├── .gitignore
├── README.md
├── spec.md
└── rules.md
```

**MUST:** Apache DocumentRoot trỏ `public/`; không truy cập trực tiếp file PHP trong `app/`, `resources/`, `config/`. Thư mục upload phải bị cấu hình **cấm thực thi PHP/script** và không cho tùy ý upload `.php`/`.phar`/`.phtml`/SVG không được sanitize.

**Convention:**

- PHP PSR-12 style; class `PascalCase`, method/variable `camelCase`, constant `UPPER_SNAKE_CASE`.
- PSR-4 namespace `App\` ánh xạ vào `app/`; không trộn HTML và SQL vào file Controller.
- Tên bảng/cột MySQL: `snake_case`, dùng `id`, `*_id`, `created_at`, `updated_at` thống nhất.
- Route URL: lowercase, dạng `/products/{slug}`, `/news/{slug}`, `/admin/products`; **GET chỉ đọc**, POST/PUT/PATCH/DELETE (nếu Router hỗ trợ) mới thay đổi trạng thái và đều kiểm tra CSRF khi dùng session.
- JSON response (khi dùng Fetch): `{ "success": true|false, "data": ..., "message": ..., "errors": ... }` với HTTP status phù hợp.
- Không hardcode secret, tài khoản quản trị, thông tin DB trong source; `.env.example` chỉ có giá trị mẫu.
- Code và tên class/biến bằng tiếng Anh; mô tả nghiệp vụ, README và báo cáo ưu tiên tiếng Việt; thuật ngữ chuyên môn giữ tiếng Anh.

---

## 7. Quy tắc Database & Transaction

1. **MUST** dùng MySQL InnoDB + UTF8MB4; tạo **primary key, foreign key, unique index** theo thiết kế; tiền dùng `DECIMAL(15,2)`, không dùng `FLOAT`.
2. **MUST** có unique constraint ít nhất cho `users.email`, `products.sku`, `products.slug`, `articles.slug`; index các cột thường lọc/tìm kiếm và FK.
3. **MUST** dùng PDO **prepared statements** cho dữ liệu đầu vào; whitelist cột sort/order và không nối trực tiếp tham số người dùng vào SQL identifier.
4. **MUST** lưu ảnh bằng đường dẫn file nội bộ, không lưu đường dẫn hotlink như dữ liệu chính; đường dẫn do backend tạo.
5. **MUST** lưu snapshot `product_name`, `sku`, `unit_price`, `quantity` ở `order_items`; sau khi đặt, đổi giá/ẩn sản phẩm không sửa lịch sử đơn.
6. **MUST** tính lại giá/tồn kho phía server trong checkout; một checkout dùng **transaction** có kiểm soát tranh chấp tồn kho (`SELECT ... FOR UPDATE` hoặc cách bảo vệ tương đương).
7. **MUST** tạo order + items + cập nhật tồn kho + xóa cart theo atomic transaction; khi lỗi rollback; không tạo đơn dở dang.
8. **MUST** hoàn kho **một lần duy nhất** khi chuyển đơn hợp lệ sang `cancelled` (transaction + kiểm tra trạng thái trước khi cập nhật).
9. **MUST NOT** hard delete product/user làm hỏng lịch sử order hoặc FK; dùng status/soft-delete khi có tham chiếu lịch sử.
10. **SHOULD** lưu migration SQL có thứ tự phiên bản (ví dụ `001_create_users.sql`); không sửa migration đã dùng trên nhiều máy, tạo migration mới.
11. **SHOULD** giới hạn một giỏ đang hoạt động cho mỗi Member bằng ràng buộc phù hợp; mỗi `(cart_id, product_id)` duy nhất.
12. **SHOULD** phân trang tại SQL (`LIMIT/OFFSET`) thay vì lấy hết dữ liệu rồi phân trang bằng JS.

**Order state machine chuẩn MVP:** `pending -> confirmed -> shipping -> completed`; `pending/confirmed -> cancelled`; không cho sửa trạng thái đơn `completed/cancelled` ngoài quy tắc được phê duyệt.

---

## 8. Security, Validation, Upload, SEO

### 8.1. Security — MUST

- Hash mật khẩu bằng `password_hash()`; kiểm tra bằng `password_verify()`; **không** lưu plaintext, MD5, SHA-1 đơn thuần.
- Regenerate session ID sau login; cookie `HttpOnly`, `SameSite` phù hợp, `Secure` khi HTTPS; logout hủy session.
- Kiểm tra authentication, role, ownership tại **backend**; Member không xem/sửa đơn của Member khác; quyền Admin không phụ thuộc nút ẩn ở UI.
- Bảo vệ CSRF cho form hoặc Fetch làm thay đổi trạng thái, kể cả chức năng gửi liên hệ/đăng ký nếu dùng cookie session.
- Escape dữ liệu khi output HTML (`htmlspecialchars(..., ENT_QUOTES, 'UTF-8')`); nội dung rich text cần lọc HTML theo allowlist trước khi render, không chỉ loại bỏ `<script>`.
- Dùng prepared statements chống SQL injection, validate type/length/range/format ở PHP; client validation chỉ để cải thiện UX.
- Upload ảnh: chỉ cho **JPG/JPEG/PNG/WebP** theo `spec.md`; MIME thực qua Fileinfo, giới hạn dung lượng (baseline 5 MB/ảnh), tên file ngẫu nhiên, kiểm tra lỗi upload, không dùng nguyên tên file client.
- Không execute file upload; với file không tin cậy, cân nhắc lưu ngoài webroot/serve qua handler hoặc chỉ cho public ảnh đã xác minh.
- Không lộ stack trace, SQL query, mật khẩu, `.env` trong production; dùng error logging an toàn.
- Redirect sau login và URL trả về phải là đường dẫn nội bộ hợp lệ, tránh open redirect.

### 8.2. SEO & frontend standards — MUST

- Mỗi trang public có `title`, `meta description` phù hợp, semantic HTML5, heading có thứ bậc, ảnh có `alt`.
- Sản phẩm/bài viết dùng `slug` duy nhất; URL dễ đọc; sitemap/robots cơ bản; trang không tồn tại trả **404**.
- Các trang public quan trọng phải có nội dung HTML server-rendered để crawler có thể đọc không cần chờ JS.
- Layout mobile-first; kiểm thử ít nhất viewport khoảng **375px, 768px, 1440px**, Chrome/Edge/Firefox.
- Kiểm tra HTML5/CSS3 bằng công cụ W3C và xử lý lỗi hợp lý; lazy-load ảnh không quan trọng, không làm mất nội dung SEO cốt lõi.
- Mọi form có thông báo validation rõ ràng; trang danh sách có pagination, empty state hợp lý.

---

## 9. HTTP, UX và luồng nghiệp vụ chuẩn

### 9.1. HTTP rules

- **GET** chỉ lấy dữ liệu/hiển thị; không được dùng GET để xóa hoặc thay đổi trạng thái.
- **POST** cho tạo, login, checkout và thay đổi trạng thái; **POST/PUT/PATCH/DELETE** cho cập nhật/xóa nếu Router hỗ trợ phương thức tương ứng.
- `400/422` input không hợp lệ; `401` chưa đăng nhập (đặc biệt JSON API); `403` không đủ quyền; `404` không tồn tại; `409` xung đột trạng thái/tồn kho; `500` lỗi server không lộ chi tiết.
- Form HTML nên dùng **PRG** sau submit thành công; không xử lý lại dữ liệu khi refresh.
- Fetch/JSON chỉ dùng khi cải thiện UX (add to cart, duyệt trạng thái, filter động); **không buộc mọi trang phải là API**.

### 9.2. Các flow bắt buộc được test đầu cuối

1. **Register/Login:** validate JS -> validate PHP -> lưu hash -> tạo session -> phân quyền.
2. **Catalog Search:** từ khóa -> validate query -> PDO prepared statement -> phân trang -> kết quả/empty state.
3. **Add To Cart:** kiểm tra ID/số lượng -> đọc thông tin Catalog -> thêm/cập nhật giỏ (Guest session hoặc Member database).
4. **Checkout COD:** xác thực -> kiểm tra cart/địa chỉ -> lấy lại giá/tồn kho -> khóa bản ghi -> transaction tạo đơn/trừ kho/xóa giỏ -> xác nhận.
5. **Cancel Order:** Admin xác thực quyền -> xác minh chuyển trạng thái hợp lệ -> transaction đổi trạng thái/hoàn kho một lần.
6. **Admin CRUD:** middleware Admin + CSRF -> validate -> xử lý Service/Repository -> upload ảnh an toàn (nếu có) -> lưu -> PRG.
7. **Comment Moderation:** Member đăng bình luận pending -> Admin duyệt -> public chỉ hiện approved.
8. **Contact Management:** khách gửi liên hệ -> Admin xem/đánh dấu unread/read/replied/xóa.

---

## 10. Definition of Done (DoD) / Quality Gates

Một chức năng chỉ được coi là **Done** khi đáp ứng **tất cả** điều kiện có liên quan:

- [ ] Có yêu cầu/UC hoặc task ID trong `spec.md`/backlog; nằm đúng bounded context, có người sở hữu.
- [ ] Có giao diện hoạt động desktop + mobile, xử lý loading/empty/error tối thiểu khi cần.
- [ ] Có **client-side và server-side validation** cho form.
- [ ] Có backend authorization, CSRF, PDO prepared statements, escape output và bảo vệ upload nếu liên quan.
- [ ] Danh sách dài/admin có phân trang; upload hình được lưu server.
- [ ] Có kịch bản **happy path + invalid input + forbidden access**; checkout/hủy đơn thêm transaction/concurrency tests.
- [ ] Dữ liệu được lưu và đọc đúng MySQL; FK, uniqueness và xử lý lỗi hợp lệ.
- [ ] Không vi phạm boundary hoặc gọi trực tiếp Repository của context khác.
- [ ] Không thêm PHP Framework/CMS, không thêm ngôn ngữ server trái yêu cầu.
- [ ] Git PR được review; không commit `.env`, mật khẩu, file cache, upload test hoặc `vendor/` nếu nhóm chọn bỏ qua.
- [ ] Có dữ liệu demo và hướng dẫn chạy/thử chức năng trong README hoặc báo cáo.

### Checklist nghiệm thu theo mốc

**Tuần 1–2:** nghiên cứu website cùng lĩnh vực, business analysis, phạm vi, chức năng, stack hợp lệ.  
**Tuần 3–4:** Use-case Diagram, Use-case Scenarios, actors, tiền/hậu điều kiện và ngoại lệ.  
**Lần nộp 1:** source HTML5/CSS3/JavaScript cho các giao diện yêu cầu, responsive, W3C.  
**Lần nộp 2:** source PHP/MySQL, Admin TailAdmin Free, database/seed, test, demo và báo cáo >= 20 trang.

---

## 11. Quy tắc làm việc nhóm và quản lý thay đổi

- Mỗi task phải nêu: **ID**, context, route/UI liên quan, bảng dữ liệu, người phụ trách, acceptance criteria.
- Branch theo dạng `feature/<context>-<short-name>`; thay đổi DB phải có migration SQL trong cùng PR.
- Thay đổi public service contract giữa context phải thông báo và cập nhật bên sử dụng; không tự ý sửa trực tiếp nhiều context khi không được review.
- Thay đổi chức năng P0, business rule hoặc schema ảnh hưởng nhiều context phải **cập nhật `spec.md` trước hoặc cùng PR** và cập nhật `rules.md` nếu đổi quy tắc kỹ thuật.
- Ít nhất một người khác review PR, kiểm tra test và quy định assignment trước khi merge.
- Không thêm dependency mới chỉ vì “tiện”; phải ghi rõ mục đích, license, có phải PHP framework/CMS không và phương án không dùng dependency.
- Ưu tiên đúng chức năng & đúng đề trước styling/bonus; không hy sinh yêu cầu bắt buộc để làm PC Builder hay công nghệ phức tạp.

---

## 12. Các quyết định chốt và điều kiện ngoại lệ

| Quyết định | Mặc định của dự án |
|---|---|
| Hình thức triển khai | **Một ứng dụng PHP MVC tự viết**, server-rendered |
| API | Chỉ endpoint JSON cục bộ cho phần tương tác thực sự cần |
| Database | **Một MySQL database**; mỗi context sở hữu bảng riêng |
| Checkout | **Member + COD**; trừ kho khi tạo đơn thành công |
| Cart Guest | Session; đồng bộ vào Member cart là P1 |
| Quản trị | TailAdmin Free + PHP Views, bảo vệ RBAC |
| Upload | Hình ảnh lưu nội bộ trên server, giới hạn và chặn script |
| Quyền thay đổi đơn | Admin; tuân thủ state machine và hoàn kho idempotent |
| Nâng cấp stack | Chỉ khi không vi phạm BT và được nhóm chấp thuận bằng tài liệu |

**Mọi ngoại lệ** phải có lý do, đánh giá ảnh hưởng đến assignment, các module bị ảnh hưởng và quyết định được ghi nhận qua PR/issue. Không ngoại lệ nào được phép vượt quy định **[BT]**.

---

## 13. Nguồn tham chiếu

- **`assignment.pdf`** — quy định chính thức môn Lập trình Web (HK1 2026–2027).
- **[`spec.md`](./spec.md)** — SRS v1.0 của Computer Store, đặc tả chức năng/phi chức năng/nghiệp vụ.
- **TailAdmin Free documentation:** <https://tailadmin.com/docs> — tham khảo UI admin theo yêu cầu đề.
- **W3C Markup Validator:** <https://validator.w3.org/> — kiểm tra chuẩn HTML.

> **Nguyên tắc cuối:** **Đúng đề bài > hoàn thiện P0 > code rõ ràng và an toàn > mở rộng tính năng.**
