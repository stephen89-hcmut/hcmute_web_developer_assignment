# ĐẶC TẢ YÊU CẦU PHẦN MỀM (SRS)

## Website công ty kinh doanh máy tính và linh kiện

| Thông tin | Nội dung |
|---|---|
| Tên dự án | **Computer Store — Website kinh doanh máy tính & linh kiện** |
| Môn học | Lập trình Web — HK1 2026–2027 |
| Phiên bản tài liệu | 1.0 — Bản đặc tả triển khai ban đầu |
| Ngày | 14/10/2026 |
| Loại hệ thống | Website doanh nghiệp kết hợp bán hàng trực tuyến (B2C) |
| Người thực hiện | Nhóm sinh viên (tối đa 4 thành viên) |
| Tài liệu gốc | `assignment.pdf` — Bài tập lớn Lập trình Web |

> **Quy ước nguồn yêu cầu:** **[BT]**: bắt buộc hoặc được nêu trong đề bài; **[TK]**: quyết định thiết kế của nhóm để hiện thực đề tài; **[MR]**: mở rộng tùy chọn, chỉ triển khai sau khi hoàn thành yêu cầu chính. Đề bài không quy định chi tiết mọi quy tắc nghiệp vụ của cửa hàng; các quy tắc được đánh dấu **[TK]** cần được nhóm thống nhất trước khi lập trình.

---

## 1. Tổng quan dự án

### 1.1. Mô tả

Xây dựng website cho một công ty chuyên kinh doanh máy tính, laptop, linh kiện và phụ kiện. Website vừa là kênh giới thiệu doanh nghiệp, sản phẩm/dịch vụ, tin tức công nghệ, vừa hỗ trợ khách hàng tìm kiếm sản phẩm, đặt hàng và quản lý đơn hàng. Hệ thống quản trị cho phép doanh nghiệp cập nhật nội dung, quản lý tài khoản, sản phẩm, đơn hàng, bình luận và liên hệ.

### 1.2. Mục tiêu

- **OBJ-01:** Giới thiệu thương hiệu, thông tin doanh nghiệp, sản phẩm, dịch vụ và bảng giá.
- **OBJ-02:** Cho phép tìm kiếm, xem chi tiết và đặt mua máy tính/linh kiện trực tuyến.
- **OBJ-03:** Cho phép thành viên quản lý tài khoản, giỏ hàng và lịch sử đơn hàng.
- **OBJ-04:** Cung cấp giao diện quản trị nội dung, sản phẩm, đơn hàng, thành viên và tương tác khách hàng.
- **OBJ-05:** Tuân thủ yêu cầu học phần về công nghệ, bảo mật, SEO, responsive, validation và phân trang.

### 1.3. Phạm vi

**Trong phạm vi (MVP):** trang chủ, giới thiệu, sản phẩm, dịch vụ/bảng giá, liên hệ, FAQ, tin tức, đăng ký/đăng nhập, hồ sơ, giỏ hàng, đặt hàng COD, lịch sử đơn hàng, quản trị tài khoản/sản phẩm/đơn hàng/tin tức/bình luận/nội dung/liên hệ/FAQ.

**Ngoài phạm vi MVP:** thanh toán trực tuyến thực, tích hợp hãng vận chuyển, quản lý nhiều kho/chi nhánh, marketplace nhiều người bán, ERP, AI chatbot, cấu hình PC tự động kiểm tra tương thích phức tạp.

### 1.4. Danh mục kinh doanh mẫu

Laptop; PC lắp ráp; CPU; Mainboard; RAM; GPU; SSD/HDD; PSU; Case; màn hình; bàn phím, chuột; thiết bị mạng; phụ kiện. Dịch vụ có thể gồm lắp ráp PC, vệ sinh máy, nâng cấp phần cứng và tư vấn cấu hình.

---

## 2. Ràng buộc từ assignment [BT]

| ID | Yêu cầu không được vi phạm |
|---|---|
| CON-01 | Backend **chỉ sử dụng PHP >= 7.0**; nhóm chủ động chọn PHP 8.x để triển khai. |
| CON-02 | Cơ sở dữ liệu **MySQL**; giao diện sử dụng HTML5/CSS3/JavaScript. |
| CON-03 | **Không dùng PHP Framework, CMF hoặc CMS** (ví dụ Laravel, Symfony, WordPress, Magento). |
| CON-04 | Có thể **tự viết MVC**; được dùng thư viện/framework CSS và JavaScript. |
| CON-05 | Admin sử dụng **TailAdmin Free Dashboard template** và tập trung xây dựng chức năng quản lý. |
| CON-06 | Kiểm tra dữ liệu đầu vào ở **cả JavaScript và PHP** cho mọi form. |
| CON-07 | Danh sách quản trị cần **phân trang**; các danh sách dài phía public cũng cần phân trang. |
| CON-08 | Hình ảnh phải **upload lên server**, không dùng URL ảnh bên ngoài làm dữ liệu ảnh sản phẩm/nội dung. |
| CON-09 | Giao diện responsive; kiểm tra HTML5/CSS3 theo W3C; thử trên các trình duyệt phổ biến. |
| CON-10 | Nghiên cứu và áp dụng **bảo mật web, SEO cơ bản**. |
| CON-11 | Nhóm **tối đa 4 thành viên**; mỗi người phụ trách một đầu việc #1–#4 không trùng, đồng thời tham gia phần chung. |
| CON-12 | Nộp lần 1: mã nguồn **HTML5/CSS3/JavaScript** của các giao diện; lần 2: demo, source code, database, hướng dẫn cài đặt và báo cáo **>= 20 trang**. |
| CON-13 | Tự xây dựng mã nguồn; không sao chép toàn bộ website khác. Điểm đánh giá theo từng thành viên. |

> **Chú ý:** Công nghệ và yêu cầu cụ thể trong các phần tiếp theo không được mâu thuẫn bảng này. Stack đề xuất bên dưới là **[TK]**, không phải công nghệ bắt buộc duy nhất của giảng viên.

---

## 3. Người dùng và phân quyền

| Actor | Mô tả | Quyền chính |
|---|---|---|
| **Guest** | Khách chưa đăng nhập | Xem/tìm kiếm sản phẩm, tin tức, FAQ, bảng giá; gửi liên hệ; đăng ký/đăng nhập; quản lý giỏ tạm [TK]. |
| **Member** | Người dùng đã đăng nhập, tài khoản đang hoạt động | Quyền Guest; cập nhật hồ sơ/avatar/mật khẩu, bình luận bài viết, đặt hàng COD, xem đơn hàng của chính mình. |
| **Admin** | Người quản trị được cấp quyền | Quyền truy cập dashboard; quản lý user, sản phẩm, đơn hàng, nội dung, tin tức, bình luận, FAQ, liên hệ, bảng giá và hình ảnh. |

**Nguyên tắc phân quyền:** mọi thao tác thay đổi dữ liệu phải kiểm tra quyền ở **server**; việc ẩn nút ở frontend không thay thế authorization. Thành viên không được xem hoặc sửa đơn hàng/hồ sơ của người khác.

### 3.1. Ma trận truy cập

| Nhóm thao tác | Guest | Member | Admin |
|---|:---:|:---:|:---:|
| Xem nội dung public và tìm kiếm | ✓ | ✓ | ✓ |
| Đăng ký/đăng nhập | ✓ | — | — |
| Thay đổi thông tin cá nhân | — | ✓ | ✓ |
| Bình luận bài viết | — | ✓ | ✓ |
| Giỏ hàng tạm / giỏ hàng cá nhân | ✓ | ✓ | ✓ |
| Checkout, xem đơn của bản thân | — | ✓ | ✓ |
| Quản lý tài nguyên toàn hệ thống | — | — | ✓ |

---

## 4. Yêu cầu chức năng (Functional Requirements)

**Mức ưu tiên:** **P0** = phải hoàn thành trong MVP; **P1** = cải tiến nên làm sau P0; **P2** = mở rộng nếu còn thời gian. Các tính năng P0 bao gồm yêu cầu đề bài và phần hiện thực tối thiểu cần thiết cho đề tài.

### 4.1. Authentication & User Management (phần chung)

| ID | Yêu cầu | Ưu tiên | Nguồn |
|---|---|---|---|
| FR-AUTH-01 | Guest đăng ký bằng họ tên, email, mật khẩu và xác nhận mật khẩu; email không được trùng. | P0 | BT/TK |
| FR-AUTH-02 | Đăng nhập bằng email/mật khẩu; đăng xuất và hủy session hợp lệ. | P0 | BT/TK |
| FR-AUTH-03 | Phân quyền `guest`, `member`, `admin`; chặn tài khoản bị khóa. | P0 | BT/TK |
| FR-USER-01 | Member xem và sửa hồ sơ (họ tên, điện thoại, địa chỉ). | P0 | BT/TK |
| FR-USER-02 | Member đổi mật khẩu sau khi xác thực mật khẩu hiện tại. | P0 | BT/TK |
| FR-USER-03 | Member upload/thay avatar. | P0 | BT |
| FR-USER-04 | Admin xem, tìm kiếm, phân trang danh sách thành viên; sửa thông tin, khóa/mở khóa tài khoản. | P0 | BT |
| FR-USER-05 | Admin có chức năng reset mật khẩu an toàn; không hiển thị mật khẩu gốc. | P0 | BT/TK |
| FR-USER-06 | Admin xóa/vô hiệu hóa thành viên nếu không phá vỡ dữ liệu đơn hàng đã tồn tại. | P0 | BT/TK |

### 4.2. Trang chủ, giới thiệu, dịch vụ, bảng giá (đầu việc #1 và #2)

| ID | Yêu cầu | Ưu tiên | Nguồn |
|---|---|---|---|
| FR-SITE-01 | Trang chủ hiển thị logo, menu, banner, danh mục, sản phẩm nổi bật, tin mới, footer. | P0 | BT/TK |
| FR-SITE-02 | Trang giới thiệu hiển thị mô tả doanh nghiệp, lịch sử/sứ mệnh, hình ảnh, thông tin liên hệ. | P0 | BT/TK |
| FR-SITE-03 | Hiển thị danh sách dịch vụ và **bảng giá dịch vụ** (ví dụ lắp ráp/vệ sinh/nâng cấp PC). | P0 | BT/TK |
| FR-SITE-04 | Admin chỉnh sửa thông tin công ty: tên, logo, banner, hotline, email, địa chỉ, mạng xã hội, nội dung giới thiệu. | P0 | BT |
| FR-SITE-05 | Admin quản lý nội dung dịch vụ và bảng giá (xem/thêm/sửa/ẩn/xóa). | P0 | BT/TK |
| FR-SITE-06 | Menu, footer, đường dẫn và các khối giao diện dùng chung hoạt động thống nhất. | P0 | BT/TK |

### 4.3. Contact & FAQ (đầu việc #1 và #2)

| ID | Yêu cầu | Ưu tiên | Nguồn |
|---|---|---|---|
| FR-CON-01 | Guest/Member gửi liên hệ: họ tên, email, chủ đề, nội dung. | P0 | BT/TK |
| FR-CON-02 | Admin xem, tìm kiếm, phân trang, xóa liên hệ; đánh dấu `unread/read/replied`. | P0 | BT |
| FR-CON-03 | Hiển thị trạng thái gửi thành công/thất bại; ngăn dữ liệu không hợp lệ. | P0 | BT/TK |
| FR-FAQ-01 | Hiển thị danh sách câu hỏi và câu trả lời, hỗ trợ mở/đóng nội dung. | P0 | BT/TK |
| FR-FAQ-02 | Admin xem, thêm, sửa, xóa/ẩn và sắp thứ tự FAQ. | P0 | BT/TK |

### 4.4. Product Catalog (đầu việc #3)

| ID | Yêu cầu | Ưu tiên | Nguồn |
|---|---|---|---|
| FR-PRO-01 | Xem danh sách sản phẩm theo trang, chỉ hiển thị sản phẩm đang bán. | P0 | BT/TK |
| FR-PRO-02 | Tìm kiếm sản phẩm theo từ khóa tên hoặc mã SKU. | P0 | BT/TK |
| FR-PRO-03 | Xem chi tiết sản phẩm: tên, giá, mô tả, hình, danh mục, thương hiệu, tồn kho, thông số chính. | P0 | BT/TK |
| FR-PRO-04 | Lọc danh mục, khoảng giá và sắp xếp theo giá/mới nhất. | P1 | TK |
| FR-PRO-05 | Admin xem, tìm kiếm, thêm, sửa, xóa/ẩn sản phẩm; cập nhật giá và tồn kho. | P0 | BT |
| FR-PRO-06 | Admin quản lý danh mục và upload nhiều ảnh sản phẩm lên server. | P0 | BT/TK |
| FR-PRO-07 | SKU và slug sản phẩm không trùng; giá không âm, tồn kho không âm. | P0 | TK |

### 4.5. Cart, Checkout & Orders (đầu việc #3)

| ID | Yêu cầu | Ưu tiên | Nguồn |
|---|---|---|---|
| FR-CART-01 | Thêm sản phẩm vào giỏ; tăng/giảm số lượng, xóa sản phẩm; hiển thị tạm tính. | P0 | BT/TK |
| FR-CART-02 | Guest dùng giỏ tạm theo session; không được checkout trước khi đăng nhập. | P0 | TK |
| FR-CART-03 | Member có giỏ hàng lưu trong MySQL, được kiểm tra số lượng hợp lệ. | P0 | TK |
| FR-CART-04 | Có thể đồng bộ giỏ tạm của Guest vào giỏ của Member sau khi đăng nhập. | P1 | TK |
| FR-ORD-01 | Member checkout bằng thông tin người nhận, số điện thoại, địa chỉ; phương thức **COD**. | P0 | TK |
| FR-ORD-02 | Backend tự lấy giá và kiểm tra lại tồn kho trước khi tạo đơn. | P0 | TK |
| FR-ORD-03 | Tạo đơn và chi tiết đơn trong transaction; xử lý tồn kho nhất quán. | P0 | TK |
| FR-ORD-04 | Member xem danh sách/chi tiết đơn hàng của mình. | P0 | TK |
| FR-ORD-05 | Admin xem, tìm kiếm, phân trang và cập nhật trạng thái giỏ hàng/đơn hàng. | P0 | BT |
| FR-ORD-06 | Hiển thị tổng tiền, trạng thái đơn hàng; không tích hợp cổng thanh toán thật. | P0 | TK |

### 4.6. News, Articles & Comments (đầu việc #4)

| ID | Yêu cầu | Ưu tiên | Nguồn |
|---|---|---|---|
| FR-NEWS-01 | Xem danh sách bài viết/tin tức, tìm kiếm theo từ khóa, phân trang. | P0 | BT |
| FR-NEWS-02 | Xem chi tiết bài viết: tiêu đề, ảnh, nội dung, ngày đăng, tác giả. | P0 | BT/TK |
| FR-NEWS-03 | Admin xem, tìm kiếm, thêm, sửa, xóa/ẩn bài viết. | P0 | BT |
| FR-NEWS-04 | Admin cập nhật `slug`, SEO title, meta description, từ khóa và ảnh bài viết. | P0 | BT/TK |
| FR-COM-01 | Member đăng bình luận dưới bài viết; xem danh sách bình luận được hiển thị. | P0 | BT |
| FR-COM-02 | Admin xem, phân trang, duyệt/ẩn/xóa bình luận. | P0 | BT/TK |
| FR-COM-03 | Không cho phép gửi bình luận rỗng; chặn nội dung nguy hiểm khi hiển thị. | P0 | TK |

### 4.7. Quản trị chung, media và UX

| ID | Yêu cầu | Ưu tiên | Nguồn |
|---|---|---|---|
| FR-ADM-01 | Admin Dashboard dùng TailAdmin Free, sidebar điều hướng các module. | P0 | BT |
| FR-ADM-02 | Các bảng quản trị có tìm kiếm/lọc phù hợp và phân trang. | P0 | BT/TK |
| FR-ADM-03 | Mọi thao tác cập nhật dữ liệu hiển thị thông báo thành công/lỗi; yêu cầu xác nhận với thao tác nguy hiểm. | P0 | TK |
| FR-MEDIA-01 | Upload logo, banner, ảnh sản phẩm, ảnh bài viết, avatar lên máy chủ. | P0 | BT/TK |
| FR-MEDIA-02 | Kiểm tra loại tệp, dung lượng, tên tệp và quyền truy cập khi upload. | P0 | TK |
| FR-SEO-01 | Có URL thân thiện, thẻ `title`, `meta description`, semantic HTML, `alt` ảnh và sitemap cơ bản. | P0 | BT/TK |
| FR-UX-01 | Toàn bộ trang public responsive trên mobile, tablet, desktop. | P0 | BT |
| FR-UX-02 | Có empty state, lỗi 403/404/500 phù hợp và trạng thái loading cho tương tác bất đồng bộ. | P1 | TK |

### 4.8. Tính năng mở rộng [MR]

| ID | Tính năng | Ưu tiên |
|---|---|---|
| EX-01 | So sánh 2–3 sản phẩm theo giá và thông số kỹ thuật. | P2 |
| EX-02 | PC Builder chọn linh kiện và tính tổng giá, kiểm tra tương thích cơ bản. | P2 |
| EX-03 | Dashboard thống kê đơn hàng, doanh thu đơn hoàn tất, sản phẩm bán chạy. | P2 |
| EX-04 | Danh sách yêu thích (wishlist), đánh giá sản phẩm bằng sao. | P2 |

---

## 5. Quy tắc nghiệp vụ (Business Rules) [TK]

| ID | Quy tắc |
|---|---|
| BR-01 | Mỗi email chỉ thuộc một tài khoản; mật khẩu không lưu dạng plaintext. |
| BR-02 | Chỉ tài khoản `active` được đăng nhập và thực hiện chức năng Member. |
| BR-03 | Giá sản phẩm >= 0; số lượng tồn kho và số lượng mua là số nguyên hợp lệ. |
| BR-04 | Một dòng giỏ hàng tương ứng một sản phẩm; thêm trùng thì tăng số lượng, không tạo dòng trùng. |
| BR-05 | Không đặt hàng với giỏ rỗng hoặc số lượng vượt tồn kho. |
| BR-06 | Backend tính tổng tiền từ dữ liệu MySQL tại thời điểm checkout, không tin giá từ client. |
| BR-07 | Khi đặt hàng thành công: tạo `orders`, `order_items`, trừ tồn kho và xóa giỏ trong **một database transaction**. Nếu lỗi thì rollback. |
| BR-08 | Trạng thái đơn: `pending -> confirmed -> shipping -> completed`; được chuyển sang `cancelled` từ `pending/confirmed` theo quyền Admin. Không thay đổi đơn đã hoàn tất/hủy. |
| BR-09 | Khi hủy đơn đã trừ tồn kho, hoàn lại đúng số lượng bằng transaction và chỉ hoàn **một lần**. |
| BR-10 | Phương thức thanh toán MVP là COD; không thu thập số thẻ hoặc thông tin tài khoản ngân hàng. |
| BR-11 | `order_items` lưu tên, SKU, đơn giá tại thời điểm đặt để lưu lịch sử ngay cả khi sản phẩm đổi giá hoặc ngừng bán. |
| BR-12 | Xóa sản phẩm đã có lịch sử đặt hàng được xử lý bằng ẩn/ngừng bán; không làm mất dữ liệu đơn hàng. |
| BR-13 | Chỉ tác giả được phép truy cập dữ liệu cá nhân của mình; Admin được truy cập dữ liệu cần cho quản trị. |
| BR-14 | Bình luận mới ở trạng thái `pending`; chỉ bình luận `approved` hiển thị public. |
| BR-15 | Tin tức chỉ hiển thị public khi `published`; FAQ, dịch vụ và sản phẩm có cờ hiển thị riêng. |
| BR-16 | Liên hệ có trạng thái `unread`, `read`, `replied`; việc đổi trạng thái do Admin thực hiện. |
| BR-17 | Trang bảng giá dịch vụ phục vụ tra cứu; không cần tự động thanh toán dịch vụ ở MVP. |

---

## 6. Use Cases và kịch bản chính

### 6.1. Danh mục Use Cases

| ID | Actor | Use Case |
|---|---|---|
| UC-01 | Guest | Đăng ký tài khoản |
| UC-02 | Guest/Member | Đăng nhập/đăng xuất |
| UC-03 | Guest/Member | Tìm kiếm và xem sản phẩm |
| UC-04 | Guest/Member | Quản lý giỏ hàng |
| UC-05 | Member | Đặt hàng COD |
| UC-06 | Member | Xem lịch sử và chi tiết đơn hàng |
| UC-07 | Member | Cập nhật hồ sơ, mật khẩu, avatar |
| UC-08 | Guest/Member | Xem tin tức và gửi liên hệ |
| UC-09 | Member | Viết bình luận bài viết |
| UC-10 | Admin | Quản lý thành viên |
| UC-11 | Admin | Quản lý sản phẩm, danh mục và ảnh |
| UC-12 | Admin | Quản lý giỏ hàng/đơn hàng |
| UC-13 | Admin | Quản lý bài viết và bình luận |
| UC-14 | Admin | Quản lý trang chủ, giới thiệu, dịch vụ/bảng giá |
| UC-15 | Admin | Quản lý liên hệ và FAQ |

### 6.2. UC-01 — Đăng ký tài khoản

- **Actor:** Guest.
- **Tiền điều kiện:** Chưa đăng nhập.
- **Luồng chính:** (1) Mở form đăng ký → (2) nhập thông tin → (3) JavaScript kiểm tra dữ liệu → (4) gửi request → (5) PHP kiểm tra hợp lệ/email duy nhất → (6) hash mật khẩu, lưu user `member/active` → (7) thông báo thành công và chuyển sang đăng nhập.
- **Ngoại lệ:** thiếu dữ liệu, mật khẩu không khớp, email trùng hoặc lỗi database → không tạo tài khoản, hiển thị lỗi phù hợp.
- **Hậu điều kiện:** Có bản ghi user hợp lệ.

### 6.3. UC-03 — Tìm kiếm và xem sản phẩm

- **Actor:** Guest/Member.
- **Tiền điều kiện:** Website hoạt động; sản phẩm đã được đăng.
- **Luồng chính:** (1) Mở `/products` → (2) nhập từ khóa/chọn bộ lọc → (3) server truy vấn danh sách có phân trang → (4) hiển thị kết quả → (5) chọn sản phẩm → (6) xem chi tiết.
- **Ngoại lệ:** Không có kết quả → hiển thị empty state; slug không tồn tại hoặc sản phẩm không public → trả 404.
- **Hậu điều kiện:** Không thay đổi dữ liệu nghiệp vụ.

### 6.4. UC-05 — Đặt hàng COD

- **Actor:** Member.
- **Tiền điều kiện:** Đã đăng nhập; giỏ hàng có sản phẩm.
- **Luồng chính:** (1) Mở giỏ → (2) xác nhận số lượng → (3) nhập người nhận/địa chỉ/số điện thoại → (4) chọn COD → (5) gửi yêu cầu → (6) backend khóa/kiểm tra tồn kho, tính lại giá → (7) tạo đơn và chi tiết đơn, trừ tồn kho, làm rỗng giỏ trong transaction → (8) thông báo mã đơn.
- **Ngoại lệ:** Chưa đăng nhập → chuyển đến login; thiếu thông tin → báo validation; giá hoặc tồn kho thay đổi → yêu cầu xem lại giỏ; lỗi lưu dữ liệu → rollback, không tạo đơn dở dang.
- **Hậu điều kiện:** Đơn `pending` được lưu, tồn kho cập nhật nhất quán.

### 6.5. UC-11 — Admin quản lý sản phẩm

- **Actor:** Admin.
- **Tiền điều kiện:** Đăng nhập với quyền Admin.
- **Luồng chính:** (1) Mở danh sách sản phẩm → (2) tìm kiếm/phân trang → (3) chọn thêm hoặc sửa → (4) nhập thông tin, upload ảnh → (5) xác thực dữ liệu/CSRF/quyền → (6) lưu database và file → (7) thông báo kết quả.
- **Ngoại lệ:** Không đủ quyền → 403; trùng SKU/slug, giá/tồn kho không hợp lệ, file ảnh sai định dạng hoặc lỗi lưu → báo lỗi, không xuất bản dữ liệu sai.
- **Hậu điều kiện:** Danh mục/sản phẩm được cập nhật hợp lệ.

### 6.6. UC-13 — Admin quản lý tin tức và bình luận

- **Actor:** Admin.
- **Tiền điều kiện:** Đã đăng nhập với quyền Admin.
- **Luồng chính:** (1) Mở danh sách bài viết/bình luận → (2) tạo/sửa/ẩn/xóa bài viết hoặc duyệt/ẩn/xóa bình luận → (3) validate dữ liệu → (4) lưu thay đổi → (5) cập nhật nội dung public.
- **Ngoại lệ:** Bài viết không tồn tại, slug trùng, hình ảnh không hợp lệ, bình luận đã bị xóa → báo lỗi tương ứng.
- **Hậu điều kiện:** Chỉ bài viết published và bình luận approved được hiển thị.

---

## 7. Yêu cầu phi chức năng (Non-functional Requirements)

| ID | Thuộc tính | Tiêu chí kiểm tra / cách đáp ứng |
|---|---|---|
| NFR-01 | Security | PDO prepared statements chống SQL injection; escape output chống XSS; lọc HTML từ WYSIWYG bằng allowlist an toàn; CSRF token ở request thay đổi dữ liệu. |
| NFR-02 | Authentication | Hash password với `password_hash`; kiểm tra bằng `password_verify`; regenerate session ID sau login; cookie HttpOnly, SameSite và Secure khi dùng HTTPS. |
| NFR-03 | Authorization | Middleware kiểm tra session/role; kiểm tra owner của đơn hàng/hồ sơ; từ chối truy cập trái quyền bằng 403. |
| NFR-04 | File Upload | Chỉ nhận JPG/JPEG/PNG/WebP theo thiết kế; kiểm tra MIME thực, kích thước (đề xuất <= 5 MB/ảnh), tạo tên ngẫu nhiên; ngăn thực thi script trong uploads. |
| NFR-05 | Validation | Tất cả form có client-side + server-side validation; không tin dữ liệu từ browser. |
| NFR-06 | Responsive | Kiểm tra giao diện ở viewport mobile (~375 px), tablet (~768 px) và desktop (~1440 px); không tràn ngang bất thường. |
| NFR-07 | Compatibility | Test trên Chrome, Edge và Firefox phiên bản hiện hành; ưu tiên kiểm tra Safari nếu có thiết bị. |
| NFR-08 | Accessibility | Semantic HTML, label cho input, alt cho hình, focus/keyboard navigation cơ bản, tương phản đủ đọc. |
| NFR-09 | SEO | URL có slug; title/meta description theo trang; heading hợp lý; sitemap.xml/robots.txt cơ bản; canonical khi cần; nội dung public có thể được crawler truy cập. |
| NFR-10 | Performance | Phân trang danh sách; index cột lọc/tìm kiếm; ảnh có kích thước hợp lý, lazy-load ảnh không quan trọng; tránh truy vấn N+1. |
| NFR-11 | Data Integrity | MySQL InnoDB, foreign keys, unique indexes, transactions cho checkout/hủy đơn; không lưu dữ liệu đơn không hoàn chỉnh. |
| NFR-12 | Maintainability | MVC tự viết, tách Controller/Service/Repository/View; cấu hình qua environment; code style nhất quán; Git và README. |
| NFR-13 | Error Handling | Trả 403/404/500 phù hợp; không hiển thị SQL/password/stack trace ra giao diện production; ghi log lỗi cần thiết. |
| NFR-14 | Standards | Validate HTML/CSS theo W3C; code tự phát triển, tuân thủ quy định không dùng PHP Framework/CMS. |

---

## 8. Kiến trúc và công nghệ đề xuất [TK]

### 8.1. Technology Stack

| Layer | Công nghệ | Ghi chú |
|---|---|---|
| Frontend | HTML5, CSS3, JavaScript ES6+ | Server-rendered PHP Views; Fetch API cho tương tác động. |
| CSS/UI | Bootstrap 5 hoặc CSS thuần; TailAdmin Free cho Admin | CSS/JavaScript framework được phép; tránh lạm dụng thư viện. |
| Backend | **PHP 8.3** (PHP thuần, OOP) | Không dùng Laravel/Symfony/CodeIgniter hoặc framework PHP khác. |
| Data Access | PDO MySQL | Prepared statements, transactions, exception handling. |
| Database | **MySQL 8.x** (InnoDB, utf8mb4) | SQL migration/seed do nhóm tự viết. |
| Authentication | PHP Session | Session-based authentication, RBAC. |
| Dependencies | Composer **chỉ để autoload PSR-4 và thư viện độc lập được phép** | Không cài PHP Framework/CMS. |
| Web Server | Apache + PHP | Rewrite URL về `public/index.php`. |
| Dev Tools | Git, GitHub, VS Code, MySQL Workbench, Postman/Bruno | Docker Compose là tùy chọn. |

**Kiến trúc:** **Modular Monolith + MVC tự triển khai**, có thể thêm Service Layer và Repository cho nghiệp vụ nhiều logic. Một ứng dụng PHP duy nhất phục vụ public pages, member pages, admin pages và request bất đồng bộ. Không cần chia thành microservices hoặc React SPA cho MVP.

**Lưu ý TailAdmin:** Chọn phiên bản/tài nguyên giao diện TailAdmin Free có thể tích hợp được với PHP Views và đáp ứng đúng template mà giảng viên yêu cầu; kiểm tra build/dependencies trước khi chốt.

### 8.2. Skeleton dự án

```text
computer-store/
├── app/
│   ├── Core/                 # Router, Request, Response, DB, View, Validator
│   ├── Middleware/           # Auth, Admin/Role, CSRF
│   ├── Modules/
│   │   ├── Auth/
│   │   ├── User/
│   │   ├── Site/
│   │   ├── Contact/
│   │   ├── Faq/
│   │   ├── Product/
│   │   ├── Cart/
│   │   ├── Order/
│   │   ├── Article/
│   │   └── Comment/
│   └── Support/              # Uploader, Paginator, CSRF helpers
├── config/                   # app.php, database.php
├── database/
│   ├── migrations/
│   └── seeders/
├── resources/views/
│   ├── layouts/              # public, member, admin
│   ├── partials/
│   ├── public/
│   ├── auth/
│   ├── member/
│   └── admin/
├── public/
│   ├── index.php             # Front Controller
│   ├── .htaccess
│   ├── assets/               # CSS, JS, ảnh giao diện tự lưu tại server
│   └── uploads/              # images (cấu hình cấm thực thi script)
├── routes/web.php
├── tests/
├── composer.json
├── .env.example
├── .gitignore
└── README.md
```

**Luồng request:** `Browser -> Apache/public/index.php -> Router -> Middleware -> Controller -> Service -> Repository/PDO -> MySQL -> View/JSON Response`.

### 8.3. Các tuyến URL chính

| Method | URL | Chức năng |
|---|---|---|
| GET | `/`, `/about`, `/services`, `/pricing`, `/contact`, `/faq` | Trang thông tin |
| POST | `/contact` | Gửi liên hệ |
| GET | `/products`, `/products/{slug}` | Danh sách/chi tiết sản phẩm |
| GET | `/news`, `/news/{slug}` | Danh sách/chi tiết tin tức |
| GET/POST | `/register`, `/login`; POST `/logout` | Tài khoản |
| GET/POST | `/cart`, `/cart/items` | Xem và thay đổi giỏ hàng |
| GET/POST | `/checkout` | Hiển thị form, đặt đơn |
| GET | `/member/profile`, `/member/orders`, `/member/orders/{id}` | Khu vực thành viên |
| GET | `/admin` | Dashboard |
| GET/POST | `/admin/products`, `/admin/orders`, `/admin/articles`, ... | Quản trị theo module |

Các thao tác sửa/xóa sử dụng phương thức POST có CSRF token hoặc endpoint API tương ứng với method phù hợp. Router phải đảm bảo request không đúng method không làm thay đổi dữ liệu.

---

## 9. Thiết kế dữ liệu mức logic

### 9.1. Các bảng dự kiến

| Bảng | Trường chính (rút gọn) | Quan hệ/mục đích |
|---|---|---|
| `users` | `id`, `full_name`, `email`, `password_hash`, `phone`, `avatar_path`, `role`, `status`, `created_at` | Tài khoản người dùng |
| `categories` | `id`, `name`, `slug`, `parent_id`, `status` | Nhóm sản phẩm; có thể phân cấp |
| `products` | `id`, `category_id`, `sku`, `name`, `slug`, `brand`, `price`, `stock`, `description`, `status` | Thông tin sản phẩm |
| `product_images` | `id`, `product_id`, `file_path`, `is_primary`, `sort_order` | 1 sản phẩm — nhiều ảnh |
| `carts` | `id`, `user_id`, `created_at`, `updated_at` | Giỏ hàng của user |
| `cart_items` | `id`, `cart_id`, `product_id`, `quantity` | Dòng giỏ hàng |
| `orders` | `id`, `user_id`, `recipient_name`, `phone`, `shipping_address`, `total_amount`, `payment_method`, `status`, `created_at` | Đơn hàng |
| `order_items` | `id`, `order_id`, `product_id`, `product_name`, `sku`, `quantity`, `unit_price` | Snapshot sản phẩm đã đặt |
| `articles` | `id`, `author_id`, `title`, `slug`, `summary`, `content`, `thumbnail_path`, `seo_title`, `meta_description`, `keywords`, `status`, `published_at` | Tin tức/bài viết |
| `comments` | `id`, `article_id`, `user_id`, `content`, `status`, `created_at` | Bình luận bài viết |
| `contacts` | `id`, `name`, `email`, `subject`, `message`, `status`, `created_at` | Liên hệ khách hàng |
| `faqs` | `id`, `question`, `answer`, `sort_order`, `status` | Hỏi/đáp |
| `pages` | `id`, `slug`, `title`, `content`, `status` | Trang giới thiệu/chính sách |
| `site_settings` | `setting_key`, `setting_value` | Logo, banner, hotline, địa chỉ, email,... |
| `services` | `id`, `name`, `description`, `price`, `status`, `sort_order` | Dịch vụ và bảng giá |

**Quan hệ chính:** `categories 1-N products`; `products 1-N product_images`; `users 1-N orders`; `orders 1-N order_items`; `users 1-N carts` (thực tế MVP giới hạn **tối đa một giỏ đang dùng/user**); `carts 1-N cart_items`; `articles 1-N comments`; `users 1-N comments`.

**Ràng buộc DB:** `users.email`, `products.sku`, `products.slug`, `articles.slug` là duy nhất; dùng foreign key, index và `DECIMAL(15,2)` cho tiền; lưu đường dẫn ảnh thay vì blob; chuẩn hóa dữ liệu để hạn chế trùng lặp. `order_items.product_id` cần chính sách khóa ngoại phù hợp để không xóa lịch sử đơn khi sản phẩm ẩn/ngừng bán.

> Đây là **logical schema**, chưa phải SQL DDL cuối cùng. Khi sang giai đoạn thiết kế database phải bổ sung đầy đủ kiểu dữ liệu, NULL/NOT NULL, default, unique, foreign keys, index và quy tắc ON DELETE.

---

## 10. Phân chia công việc nhóm theo assignment

| Thành viên | Giao diện public | Quản trị tương ứng | Module |
|---|---|---|---|
| **#1** | Trang chủ, Liên hệ | Chỉnh nội dung Home, thông tin doanh nghiệp và quản lý liên hệ | `Site`, `Contact` |
| **#2** | Giới thiệu, FAQ | Chỉnh nội dung About và CRUD FAQ | `Site/Pages`, `Faq` |
| **#3** | Danh sách/chi tiết sản phẩm, Giỏ hàng | CRUD/tìm kiếm sản phẩm, quản lý giỏ và trạng thái đơn hàng | `Product`, `Cart`, `Order` |
| **#4** | Danh sách/chi tiết tin tức | CRUD/tìm kiếm bài viết, quản lý bình luận | `Article`, `Comment` |

**Phần chung — tất cả thành viên:** kiến trúc hệ thống, thiết kế database, template public/admin, authentication, phân quyền, hồ sơ/avatar/mật khẩu, quản trị thành viên, tích hợp, kiểm thử và báo cáo. Nhóm có thể chia nhỏ implementation nhưng **không bỏ phần trách nhiệm chung**.

---

## 11. Kế hoạch thực hiện và đầu ra

| Giai đoạn | Hoạt động | Đầu ra |
|---|---|---|
| **Tuần 1–2** | Nghiên cứu các website cùng loại, phân tích nghiệp vụ, xác định chức năng, chọn stack hợp lệ | Project scope, Functional Requirements, Technology Stack |
| **Tuần 3–4** | Xác định actors, Use-case Diagram, Use-case Scenarios, business rules | Use-case Diagram và bộ UC mô tả chi tiết |
| **Thiết kế giao diện / Lần nộp 1** | Wireframe, HTML/CSS/JS cho các trang bắt buộc, responsive | Source code giao diện nộp LMS |
| **Hiện thực backend** | MVC core, authentication, MySQL schema, CRUD các module, upload, checkout | Website chạy đầy đủ và dữ liệu mẫu |
| **Tích hợp và kiểm thử** | Security, validation, permission, responsive, pagination, W3C, test nghiệp vụ | Test cases, bằng chứng chạy thử, sửa lỗi |
| **Lần nộp 2** | Demo, mã nguồn, database, hướng dẫn cài đặt, báo cáo | Demo trực tiếp + báo cáo >= 20 trang |

**Thời hạn cụ thể của các lần nộp:** thực hiện theo lịch thông báo từ giảng viên/LMS; tài liệu gốc không cung cấp ngày chính xác.

---

## 12. Tiêu chí nghiệm thu MVP (Acceptance Criteria)

- [ ] **AC-01:** Khách truy cập được đầy đủ Home, About, Products, Product Details, Services/Pricing, Contact, FAQ, News và Article Details.
- [ ] **AC-02:** Đăng ký, đăng nhập, đăng xuất, khóa user và kiểm tra quyền hoạt động đúng; người không có quyền bị chặn ở server.
- [ ] **AC-03:** Thành viên sửa hồ sơ, mật khẩu, avatar thành công; dữ liệu được lưu bền vững.
- [ ] **AC-04:** Tìm kiếm sản phẩm/bài viết bằng từ khóa có kết quả hợp lệ; danh sách dài và danh sách quản trị có pagination.
- [ ] **AC-05:** Admin thêm/sửa/ẩn/xóa sản phẩm, upload ảnh, chỉnh giá/tồn kho và quản lý danh mục.
- [ ] **AC-06:** Thành viên thêm/sửa/xóa giỏ hàng và đặt đơn COD thành công khi tồn kho đủ.
- [ ] **AC-07:** Đặt đơn khi hết hàng hoặc có lỗi database không sinh đơn dở dang/không trừ kho sai; không tin giá client.
- [ ] **AC-08:** Thành viên chỉ xem được đơn của mình; Admin cập nhật đơn theo quy tắc trạng thái.
- [ ] **AC-09:** Admin sửa nội dung Home/About, logo, hotline, dịch vụ/bảng giá, FAQ và quản lý liên hệ.
- [ ] **AC-10:** Admin quản lý bài viết, SEO metadata, bình luận; chỉ bài published/bình luận approved hiện public.
- [ ] **AC-11:** Tất cả form kiểm tra client + server; có bảo vệ SQL injection, XSS, CSRF và upload độc hại ở mức cơ bản.
- [ ] **AC-12:** Ảnh sản phẩm/ảnh bài viết/avatar/logo được lưu trên server; không phụ thuộc hotlink ảnh ngoài.
- [ ] **AC-13:** Public/Admin responsive, giao diện kiểm thử trình duyệt, HTML/CSS qua W3C; có SEO cơ bản.
- [ ] **AC-14:** Admin tích hợp TailAdmin Free, có dữ liệu demo và hướng dẫn chạy dự án từ máy mới.
- [ ] **AC-15:** Nộp đủ source code, file database, báo cáo >= 20 trang, thông tin và đóng góp của từng thành viên.

---

## 13. Danh sách kiểm thử tối thiểu

| Test ID | Tình huống | Kết quả mong đợi |
|---|---|---|
| TC-01 | Đăng ký email đã tồn tại | Báo lỗi, không tạo user trùng |
| TC-02 | Đăng nhập sai mật khẩu/tài khoản bị khóa | Từ chối đăng nhập |
| TC-03 | Member truy cập `/admin/*` | Trả 403/chuyển hướng phù hợp, không lộ dữ liệu |
| TC-04 | User A truy cập đơn hàng của User B | Từ chối truy cập |
| TC-05 | Tìm kiếm sản phẩm không có kết quả | Hiện empty state; không lỗi server |
| TC-06 | Upload file không phải ảnh hoặc vượt kích thước | Từ chối upload |
| TC-07 | Đặt số lượng lớn hơn tồn kho | Không tạo đơn, tồn kho giữ nguyên |
| TC-08 | Checkout có lỗi giữa transaction | Rollback, không tồn tại dữ liệu đơn một phần |
| TC-09 | Sửa giá sản phẩm sau khi đặt hàng | Đơn cũ vẫn giữ đơn giá lịch sử |
| TC-10 | Gửi form thiếu dữ liệu hoặc payload nguy hiểm | Validation và xử lý an toàn |
| TC-11 | Bình luận đang pending | Không xuất hiện công khai |
| TC-12 | Admin tìm kiếm và chuyển trang danh sách | Kết quả/phân trang đúng, không trùng/bỏ bản ghi bất thường |

---

## 14. Các quyết định cần nhóm xác nhận trước khi code

1. **Thương hiệu giả định** của công ty, bộ nhận diện, nội dung giới thiệu và dữ liệu sản phẩm mẫu.
2. **Giỏ hàng Guest:** MVP có giỏ tạm trong session; việc đồng bộ sang tài khoản sau login là P1.
3. **Chính sách đơn hàng:** khách không đăng nhập không được checkout; chỉ Admin hủy đơn ở MVP; thời điểm trừ kho là khi tạo đơn thành công.
4. **Mức độ chi tiết thông số sản phẩm:** MVP dùng thông số mô tả cơ bản; bảng thông số theo loại linh kiện là giai đoạn mở rộng.
5. **Chỉnh nội dung bảng giá:** quản lý như một danh sách dịch vụ; không xây hệ thống đặt lịch dịch vụ.
6. **Quy trình reset mật khẩu:** Admin cấp quy trình đặt lại mật khẩu an toàn; không hiển thị mật khẩu hiện có và không gửi mật khẩu plaintext.
7. **Lựa chọn TailAdmin Free:** xác nhận bộ template cụ thể tích hợp được với HTML/PHP Views và quy định của giảng viên.

Các lựa chọn trên là **đề xuất thiết kế**, không phải quy định bổ sung của assignment. Nếu nhóm thay đổi, cần sửa tài liệu SRS và các use case liên quan trước khi implement.

---

## 15. Tài liệu tham chiếu

1. **Bài tập lớn Lập trình Web (HK1 2026–2027)**, tài liệu `assignment.pdf` người dùng cung cấp — nguồn quy định chính.
2. **TailAdmin Documentation**: <https://tailadmin.com/docs> — template trang quản trị được đề bài chỉ định.
3. **W3C Markup Validation Service**: <https://validator.w3.org/> — kiểm tra chuẩn HTML.

> **Trạng thái tài liệu:** SRS v1.0 — đủ làm baseline để thiết kế Use-case Diagram, Use-case Scenarios, ERD, giao diện và chia backlog implementation. Các mục **[TK]/[MR]** là quyết định/phần mở rộng đề xuất, cần thống nhất trong nhóm trước khi triển khai.
