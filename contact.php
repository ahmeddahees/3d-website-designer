<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>تواصل معنا - 3D Design Pro</title>
  <link rel="stylesheet" href="style.css" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700;800&family=Playfair+Display:wght@700;800&display=swap" rel="stylesheet">
</head>
<body>

  <!-- Navigation -->
  <nav class="navbar">
    <div class="container-fluid navbar-container">
      <a href="/" class="logo">3D Design <span>Pro</span></a>
      <ul class="nav-menu">
        <li><a href="index.php">الرئيسية</a></li>
        <li><a href="services.php">الخدمات</a></li>
        <li><a href="about.php">من نحن</a></li>
        <li><a href="#contact" class="btn-nav">تواصل معنا</a></li>
      </ul>
    </div>
  </nav>

  <!-- Page Header -->
  <section class="page-header">
    <div class="container">
      <h1>تواصل معنا</h1>
      <p>نحن هنا للرد على أسئلتك وتنفيذ مشروعك</p>
    </div>
  </section>

  <!-- Contact Section -->
  <section id="contact" class="contact-section">
    <div class="container">
      <div class="contact-grid">
        <!-- Contact Info -->
        <div class="contact-info">
          <h2>معلومات التواصل</h2>
          
          <div class="contact-item">
            <div class="contact-icon">📍</div>
            <div>
              <h4>العنوان</h4>
              <p>القاهرة، مصر</p>
            </div>
          </div>

          <div class="contact-item">
            <div class="contact-icon">📞</div>
            <div>
              <h4>الهاتف</h4>
              <p><a href="tel:+201001234567">+20 100 123 4567</a></p>
            </div>
          </div>

          <div class="contact-item">
            <div class="contact-icon">📧</div>
            <div>
              <h4>البريد الإلكتروني</h4>
              <p><a href="mailto:info@3ddesignpro.com">info@3ddesignpro.com</a></p>
            </div>
          </div>

          <div class="contact-item">
            <div class="contact-icon">⏰</div>
            <div>
              <h4>ساعات العمل</h4>
              <p>السبت - الخميس: 10:00 - 18:00</p>
              <p style="font-size: 0.9rem;">الجمعة: مغلق</p>
            </div>
          </div>

          <div class="social-links">
            <h4>تابعنا</h4>
            <div class="social-icons">
              <a href="#" class="social-icon">f</a>
              <a href="#" class="social-icon">in</a>
              <a href="#" class="social-icon">tw</a>
              <a href="#" class="social-icon">ig</a>
            </div>
          </div>
        </div>

        <!-- Contact Form -->
        <div class="contact-form-container">
          <form class="contact-form" id="contact-form">
            <div class="form-group">
              <label for="name">الاسم الكامل</label>
              <input type="text" id="name" name="name" required>
            </div>

            <div class="form-group">
              <label for="email">البريد الإلكتروني</label>
              <input type="email" id="email" name="email" required>
            </div>

            <div class="form-group">
              <label for="phone">رقم الهاتف</label>
              <input type="tel" id="phone" name="phone" required>
            </div>

            <div class="form-group">
              <label for="service">نوع الخدمة</label>
              <select id="service" name="service" required>
                <option value="">اختر الخدمة</option>
                <option value="animation">رسوميات متحركة</option>
                <option value="game">نماذج ألعاب</option>
                <option value="industrial">تصميم صناعي</option>
                <option value="architecture">فيزيولايزاشن معماري</option>
                <option value="fashion">تصميم موضة</option>
                <option value="packaging">تصميم عبوات</option>
                <option value="other">أخرى</option>
              </select>
            </div>

            <div class="form-group">
              <label for="budget">الميزانية المتوقعة</label>
              <select id="budget" name="budget" required>
                <option value="">اختر الميزانية</option>
                <option value="500-1000">500 - 1000 ر.س</option>
                <option value="1000-2000">1000 - 2000 ر.س</option>
                <option value="2000-5000">2000 - 5000 ر.س</option>
                <option value="5000+">أكثر من 5000 ر.س</option>
              </select>
            </div>

            <div class="form-group">
              <label for="message">تفاصيل المشروع</label>
              <textarea id="message" name="message" rows="6" placeholder="اخبرنا عن فكرتك ومتطلبات مشروعك..." required></textarea>
            </div>

            <div class="form-group form-checkbox">
              <input type="checkbox" id="terms" name="terms" required>
              <label for="terms">أوافق على شروط الخصوصية</label>
            </div>

            <button type="submit" class="btn btn-primary btn-large">إرسال الرسالة</button>
          </form>
        </div>
      </div>
    </div>
  </section>

  <!-- FAQ Section -->
  <section class="faq-section">
    <div class="container">
      <h2 class="section-title">الأسئلة الشائعة</h2>
      
      <div class="faq-grid">
        <div class="faq-item">
          <h3>كم يستغرق المشروع؟</h3>
          <p>يعتمد الوقت على حجم وتعقيد المشروع. عادة ما تستغرق المشاريع البسيطة 3-5 أيام والمشاريع المعقدة 2-3 أسابيع.</p>
        </div>

        <div class="faq-item">
          <h3>هل يمكن عمل تعديلات على التصميم؟</h3>
          <p>بالتأكيد! كل باقة تتضمن عدد معين من التعديلات. الباقة الاحترافية تتضمن تعديلات غير محدودة.</p>
        </div>

        <div class="faq-item">
          <h3>ما هي الملفات التي سأستقبلها؟</h3>
          <p>تستقبل ملفات 3D بصيغ متعددة (FBX, OBJ, BLEND) بالإضافة إلى صور عالية الدقة للمشروع.</p>
        </div>

        <div class="faq-item">
          <h3>هل تقدمون الدعم بعد التسليم؟</h3>
          <p>نعم، نقدم دعم فني بعد التسليم لمدة شهر واحد بالإضافة إلى تحديثات مستقبلية.</p>
        </div>

        <div class="faq-item">
          <h3>هل يمكن استخدام الملفات تجارياً؟</h3>
          <p>نعم، جميع الملفات والتصاميم ملك لك بالكامل يمكنك استخدامها بأي طريقة تريدها.</p>
        </div>

        <div class="faq-item">
          <h3>كيف يمكن البدء بمشروع؟</h3>
          <p>ما عليك سوى ملء نموذج التواصل أعلاه، وسيتواصل معك فريقنا لمناقشة تفاصيل مشروعك.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer class="footer">
    <div class="container">
      <div class="footer-content">
        <div class="footer-section">
          <h4>3D Design Pro</h4>
          <p>متخصصون في تصميم النماذج ثلاثية الأبعاد بأعلى مستويات الاحترافية</p>
        </div>
        
        <div class="footer-section">
          <h4>الروابط السريعة</h4>
          <ul>
            <li><a href="index.php">الرئيسية</a></li>
            <li><a href="services.php">الخدمات</a></li>
            <li><a href="about.php">من نحن</a></li>
            <li><a href="#contact">تواصل</a></li>
          </ul>
        </div>
        
        <div class="footer-section">
          <h4>تواصل معنا</h4>
          <p>البريد: info@3ddesignpro.com</p>
          <p>الهاتف: +20 100 123 4567</p>
        </div>
      </div>
      
      <div class="footer-bottom">
        <p>&copy; 2026 3D Design Pro. جميع الحقوق محفوظة</p>
      </div>
    </div>
  </footer>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
  <script src="script.js"></script>
</body>
</html>
