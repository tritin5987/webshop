$(document).ready(function() {
    // Cấu hình URL gốc
    const baseUrl = window.location.origin + '/webshop/'; // Đường dẫn thư mục webshop

    // Biến trạng thái kịch bản
    let chatState = {
        step: 'welcome',
        categoryId: null,
        priceMax: null
    };

    // Toggle Chatbox
    $('.chatbot-toggle').on('click', function() {
        $('.chatbot-box').toggleClass('active');
        // Nếu lần đầu mở ra, thử tải lịch sử chat
        if ($('.chatbot-body').children().length === 0) {
            loadChatHistory();
        }
    });

    // Close Chatbox
    $('.chatbot-close').on('click', function() {
        $('.chatbot-box').removeClass('active');
    });

    // Handle Quick Reply buttons clicks
    $(document).on('click', '.chat-btn', function() {
        const text = $(this).text();
        const action = $(this).data('action');

        // Hiển thị tin nhắn người dùng chọn
        addUserMessage(text);

        // Chuyển hướng xử lý kịch bản
        handleKịchBản(action);
    });

    // Handle Input sending
    $('.chatbot-send').on('click', function() {
        submitInput();
    });

    $('.chatbot-input').on('keypress', function(e) {
        if (e.which === 13) {
            submitInput();
        }
    });

    function submitInput() {
        const input = $('.chatbot-input').val().trim();
        if (input === "") return;

        addUserMessage(input);
        $('.chatbot-input').val("");

        // Phân tích từ khóa đầu vào thuần túy (Khớp từ khóa thông minh)
        analyzeKeyword(input);
    }

    // Xử lý từ khóa thô người dùng tự gõ
    function analyzeKeyword(text) {
        const lowerText = text.toLowerCase();

        // 1. Tra cứu đơn hàng dạng: "kiểm tra đơn 30" hoặc "đơn hàng #30"
        const orderMatch = lowerText.match(/(?:đơn hàng|mã đơn|đơn|hoá đơn|hoa don|don hang)\s*(?:#|no|số)?\s*(\d+)/i);
        if (orderMatch && orderMatch[1]) {
            queryOrder(orderMatch[1]);
            return;
        }

        if (chatState.step === 'wait_order_id' && /^\d+$/.test(text)) {
            queryOrder(text);
            return;
        }

        // 2. Các từ khóa chuyên mục
        if (lowerText.includes("màn hình") || lowerText.includes("lcd") || lowerText.includes("dell") || lowerText.includes("hp") || lowerText.includes("lg") || lowerText.includes("msi")) {
            // Chuyên mục màn hình
            chatState.step = 'select_price';
            chatState.categoryId = 3; // ID danh mục màn hình
            showPriceOptions();
            return;
        }

        if (lowerText.includes("ram") || lowerText.includes("adata") || lowerText.includes("kingston") || lowerText.includes("lưu trữ") || lowerText.includes("ổ cứng") || lowerText.includes("ssd") || lowerText.includes("hdd") || lowerText.includes("seagate")) {
            // Thiết bị lưu trữ / RAM
            chatState.step = 'select_price';
            chatState.categoryId = 1; // ID thiết bị lưu trữ
            showPriceOptions();
            return;
        }

        if (lowerText.includes("nguồn") || lowerText.includes("case") || lowerText.includes("tản") || lowerText.includes("quạt") || lowerText.includes("noctua") || lowerText.includes("asus") || lowerText.includes("thor")) {
            // Nguồn / Case / Tản
            chatState.step = 'select_price';
            chatState.categoryId = 4; // ID Nguồn/Case/Tản
            showPriceOptions();
            return;
        }

        // 3. Khớp chào hỏi
        if (lowerText.includes("chào") || lowerText.includes("hello") || lowerText.includes("hi")) {
            sendBotMessage("Xin chào! Hãy click vào các gợi ý dưới đây hoặc cho tôi biết linh kiện bạn cần nhé!", [
                { text: "🔍 Tìm Kiếm Linh Kiện", value: "search_hardware" },
                { text: "📦 Tra Cứu Đơn Hàng", value: "check_order" }
            ]);
            return;
        }

        // 4. Mặc định nếu không hiểu từ khóa
        sendBotMessage("Tôi chưa hiểu rõ yêu cầu của bạn lắm. Hãy thử lựa chọn một trong các thao tác bên dưới nhé:", [
            { text: "🔍 Tư Vấn Linh Kiện", value: "search_hardware" },
            { text: "📦 Tra Cứu Đơn Hàng", value: "check_order" },
            { text: "📞 Liên Hệ Hỗ Trợ", value: "contact" }
        ]);
    }

    // Xử lý Cây Quyết Định (Kịch Bản Click Nút)
    function handleKịchBản(action) {
        // Tắt hiển thị các nút lựa chọn cũ
        $('.chatbot-body .chat-options').last().hide();

        if (action === "search_hardware" || action === "back_to_categories") {
            chatState.step = 'select_category';
            showCategories();
        } 
        else if (action.startsWith("cat_")) {
            const categoryId = action.split("_")[1];
            chatState.step = 'select_price';
            chatState.categoryId = categoryId;
            showPriceOptions();
        } 
        else if (action.startsWith("price_")) {
            const priceMax = action.split("_")[1];
            chatState.step = 'show_products';
            chatState.priceMax = priceMax;
            queryRecommendations();
        } 
        else if (action === "check_order") {
            chatState.step = 'wait_order_id';
            sendBotMessage("Vui lòng nhập **Mã đơn hàng số** của bạn (ví dụ: `30` hoặc `28`):");
        } 
        else if (action === "contact") {
            sendBotMessage("Bạn có thể gọi trực tiếp Hotline: <strong>0988.342.551</strong> để được tư vấn viên hỗ trợ lập tức, hoặc để lại tin nhắn liên hệ tại trang Liên Hệ dưới đây:", [
                { text: "📩 Tới Trang Liên Hệ", value: "go_to_contact_page" }
            ]);
        }
        else if (action === "go_to_contact_page") {
            window.location.href = baseUrl + "lien-he/";
        }
    }

    // Các hàm phụ trợ gọi API / Render Giao Diện
    function showCategories() {
        showTypingIndicator();
        $.ajax({
            url: baseUrl + 'chatbot/get_categories',
            method: 'GET',
            dataType: 'json',
            success: function(categories) {
                removeTypingIndicator();
                let options = [];
                categories.forEach(function(cat) {
                    options.push({ text: cat.TenChuyenMuc, value: "cat_" + cat.MaChuyenMuc });
                });
                sendBotMessage("Vui lòng chọn loại linh kiện bạn muốn tôi tư vấn:", options);
            },
            error: function() {
                removeTypingIndicator();
                sendBotMessage("Có lỗi xảy ra khi tải danh mục sản phẩm. Thử lại sau nhé!");
            }
        });
    }

    function showPriceOptions() {
        sendBotMessage("Chọn tầm giá tối đa bạn muốn đầu tư:", [
            { text: "💰 Dưới 2 Triệu", value: "price_2000000" },
            { text: "💰 Dưới 5 Triệu", value: "price_5000000" },
            { text: "💰 Dưới 10 Triệu", value: "price_10000000" },
            { text: "💰 Mọi Tầm Giá", value: "price_99999999" }
        ]);
    }

    function queryRecommendations() {
        showTypingIndicator();
        $.ajax({
            url: baseUrl + 'chatbot/get_recommendations',
            method: 'POST',
            data: {
                category_id: chatState.categoryId,
                price_max: chatState.priceMax
            },
            dataType: 'json',
            success: function(products) {
                removeTypingIndicator();
                if (products.length === 0) {
                    sendBotMessage("Xin lỗi, hiện tại cửa hàng chưa có sản phẩm nào thuộc phân khúc này. Hãy thử chọn lại phân khúc khác nhé!", [
                        { text: "🔄 Chọn lại linh kiện", value: "back_to_categories" }
                    ]);
                } else {
                    sendBotMessage("Dưới đây là một số sản phẩm tốt nhất phù hợp với yêu cầu của bạn:");
                    renderProductCarousel(products);
                }
            },
            error: function() {
                removeTypingIndicator();
                sendBotMessage("Có lỗi xảy ra khi tìm kiếm sản phẩm. Thử lại sau!");
            }
        });
    }

    function queryOrder(orderId) {
        showTypingIndicator();
        $.ajax({
            url: baseUrl + 'chatbot/check_order',
            method: 'POST',
            data: { order_id: orderId },
            dataType: 'json',
            success: function(response) {
                removeTypingIndicator();
                sendBotMessage(response.reply, [
                    { text: "🔄 Tiếp tục tra cứu", value: "check_order" },
                    { text: "🏠 Về Menu Chính", value: "back_to_categories" }
                ]);
                chatState.step = 'welcome';
            },
            error: function() {
                removeTypingIndicator();
                sendBotMessage("Không thể kiểm tra đơn hàng lúc này. Vui lòng thử lại sau!");
            }
        });
    }

    function renderProductCarousel(products) {
        let html = '<div class="chatbot-products">';
        products.forEach(function(p) {
            html += `
                <a href="${p.detail_url}" class="chatbot-product-item" target="_blank">
                    <img src="${p.AnhChinh}" class="chatbot-product-img" alt="${p.TenSanPham}">
                    <div class="chatbot-product-info">
                        <div class="chatbot-product-title">${p.TenSanPham}</div>
                        <div class="chatbot-product-price">${p.formatted_price}</div>
                    </div>
                </a>
            `;
        });
        html += '</div>';

        $('.chatbot-body').append(html);
        scrollToBottom();

        // Lưu danh sách sản phẩm đề xuất lên DB
        saveChatOnServer('bot', html);
    }

    function loadChatHistory() {
        showTypingIndicator();
        $.ajax({
            url: baseUrl + 'chatbot/get_chat_history',
            method: 'GET',
            dataType: 'json',
            success: function(history) {
                removeTypingIndicator();
                if (history && history.length > 0) {
                    history.forEach(function(msg) {
                        let html = '';
                        if (msg.sender === 'user') {
                            html = `<div class="chat-msg user">${msg.message}</div>`;
                        } else {
                            html = `<div class="chat-msg bot">${msg.message}</div>`;
                        }
                        $('.chatbot-body').append(html);
                    });
                    scrollToBottom();
                } else {
                    // Lời chào mặc định nếu chưa có lịch sử
                    sendBotMessage("Xin chào! Tôi là Trợ Lý Ảo của LinhKienNhanh.VN. Tôi có thể giúp gì cho bạn hôm nay?", [
                        { text: "🔍 Tư Vấn Linh Kiện", value: "search_hardware" },
                        { text: "📦 Tra Cứu Đơn Hàng", value: "check_order" },
                        { text: "📞 Gặp Nhân Viên", value: "contact" }
                    ]);
                }
            },
            error: function() {
                removeTypingIndicator();
                sendBotMessage("Xin chào! Tôi là Trợ Lý Ảo của LinhKienNhanh.VN. Tôi có thể giúp gì cho bạn hôm nay?", [
                    { text: "🔍 Tư Vấn Linh Kiện", value: "search_hardware" },
                    { text: "📦 Tra Cứu Đơn Hàng", value: "check_order" },
                    { text: "📞 Gặp Nhân Viên", value: "contact" }
                ]);
            }
        });
    }

    function saveChatOnServer(sender, message) {
        $.ajax({
            url: baseUrl + 'chatbot/save_chat',
            method: 'POST',
            data: {
                sender: sender,
                message: message
            },
            dataType: 'json'
        });
    }

    function addUserMessage(text) {
        const html = `<div class="chat-msg user">${text}</div>`;
        $('.chatbot-body').append(html);
        scrollToBottom();

        // Lưu vào DB
        saveChatOnServer('user', text);
    }

    function sendBotMessage(htmlContent, options = null) {
        let html = `<div class="chat-msg bot">${htmlContent}`;
        
        if (options && options.length > 0) {
            html += '<div class="chat-options">';
            options.forEach(function(opt) {
                html += `<button class="chat-btn" data-action="${opt.value}">${opt.text}</button>`;
            });
            html += '</div>';
        }
        
        html += '</div>';
        $('.chatbot-body').append(html);
        scrollToBottom();

        // Lưu vào DB
        saveChatOnServer('bot', htmlContent);
    }

    function showTypingIndicator() {
        const html = `
            <div class="chat-msg bot typing-indicator">
                <div class="typing-dots">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
        `;
        $('.chatbot-body').append(html);
        scrollToBottom();
    }

    function removeTypingIndicator() {
        $('.chatbot-body .typing-indicator').remove();
    }

    function scrollToBottom() {
        const body = $('.chatbot-body');
        body.scrollTop(body[0].scrollHeight);
    }
});

