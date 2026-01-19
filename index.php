<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>3D Design Pro - تصميم نماذج ثلاثية الأبعاد احترافية</title>
  <link rel="stylesheet" href="style.css" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700;800&family=Playfair+Display:wght@700;800&display=swap" rel="stylesheet">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/three@0.128.0/examples/js/loaders/GLTFLoader.js"></script>
  <style>
    html {
      scroll-behavior: smooth;
      scroll-snap-type: y mandatory;
    }
    
    
  
  </style>
</head>
<body>

  <!-- Navigation -->
  <nav class="navbar">
    <div class="container-fluid navbar-container">
      <a href="#" class="logo">3D Design <span>Pro</span></a>
      <button class="nav-toggle" id="nav-toggle">
        <span></span>
        <span></span>
        <span></span>
      </button>
      <ul class="nav-menu" id="nav-menu">
        <li><a href="#home">الرئيسية</a></li>
        <li><a href="#services">الخدمات</a></li>
        <li><a href="#about">من نحن</a></li>
        <li><a href="#contact" class="btn-nav">تواصل معنا</a></li>
      </ul>
    </div>
  </nav>

  <!-- Hero Section with 3D -->
  <section id="home" class="hero">
    <div class="canvas-container" id="canvas-container"></div>
    
    <div class="hero-content">
      <div class="hero-text">
        <h1 class="hero-title" data-aos="fade-up">
          <span class="gradient-text">تصاميم ثلاثية</span>
          <span>الأبعاد احترافية</span>
        </h1>
        <p class="hero-subtitle" data-aos="fade-up" data-aos-delay="100">
          نحول أفكارك إلى نماذج 3D متقنة وواقعية باستخدام أحدث التقنيات والبرامج المتخصصة
        </p>
        <div class="hero-ctas" data-aos="fade-up" data-aos-delay="200">
          <a href="contact.php" class="btn btn-primary">طلب مشروع</a>
          <a href="services.php" class="btn btn-secondary">استكشف الخدمات</a>
        </div>
      </div>
    </div>

    <div class="hero-scroll">
      <span>اسحب للأسفل</span>
      <div class="mouse">
        <div class="wheel"></div>
      </div>
    </div>
  </section>

  <!-- Features Section -->
  <section class="features">
    <div class="container">
      <h2 class="section-title" data-aos="fade-up">لماذا نختارنا</h2>
      
      <div class="features-grid">
        <div class="feature-card" data-aos="fade-up">
          <div class="feature-icon">🎨</div>
          <h3>تصاميم مبتكرة</h3>
          <p>تصاميم فريدة تعكس رؤيتك وتتماشى مع هويتك البصرية</p>
        </div>

        <div class="feature-card" data-aos="fade-up" data-aos-delay="100">
          <div class="feature-icon">⚡</div>
          <h3>تقنيات حديثة</h3>
          <p>استخدام أحدث برامج التصميم والتكنولوجيا 3D</p>
        </div>

        <div class="feature-card" data-aos="fade-up" data-aos-delay="200">
          <div class="feature-icon">📱</div>
          <h3>مرن وديناميكي</h3>
          <p>تصاميم قابلة للتعديل والتطوير حسب احتياجاتك</p>
        </div>

        <div class="feature-card" data-aos="fade-up" data-aos-delay="300">
          <div class="feature-icon">⏱️</div>
          <h3>التسليم في الوقت</h3>
          <p>التزام كامل بمواعيد التسليم وأعلى معايير الجودة</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Showcase Section -->
  <section class="showcase">
    <div class="container">
      <h2 class="section-title" data-aos="fade-up">أحدث أعمالنا</h2>
      
      <div class="showcase-grid">
        <div class="showcase-item" data-aos="fade-up">
          <div class="showcase-image">
            <img src="./img/1.jpg" alt="عمل 3D">
            <div class="overlay">
              <a href="#" class="view-btn" data-img="./img/1.jpg">عرض التفاصيل</a>
            </div>
          </div>
          <h3>تصميم شخصية 3D</h3>
          <p>نموذج شخصية ثلاثية الأبعاد متقنة للعبة</p>
        </div>

        <div class="showcase-item" data-aos="fade-up" data-aos-delay="100">
          <div class="showcase-image">
            <img src="./img/2.jpg" alt="عمل 3D">
            <div class="overlay">
              <a href="#" class="view-btn" data-img="./img/2.jpg">عرض التفاصيل</a>
            </div>
          </div>
          <h3>منتج قابل للتحريك</h3>
          <p>تصميم منتج صناعي مع محاكاة الحركة</p>
        </div>

        <div class="showcase-item" data-aos="fade-up" data-aos-delay="200">
          <div class="showcase-image">
            <img src="./img/3.jpg" alt="عمل 3D">
            <div class="overlay">
              <a href="#" class="view-btn" data-img="./img/3.jpg">عرض التفاصيل</a>
            </div>
          </div>
          <h3>بيئة افتراضية</h3>
          <p>مشهد 3D كامل بتفاصيل واقعية عالية</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Image Modal -->
  <div id="image-modal" class="image-modal">
    <div class="modal-overlay"></div>
    <div class="modal-content">
      <button class="modal-close">&times;</button>
      <img id="modal-image" src="" alt="">
    </div>
  </div>

  <!-- CTA Section -->
  <section class="cta-section">
    <div class="container">
      <div class="cta-content">
        <h2>هل لديك مشروع في الذهن؟</h2>
        <p>دعنا نحوله إلى واقع ثلاثي الأبعاد</p>
        <a href="#services" class="btn btn-large">ابدأ مشروعك الآن</a>
      </div>
    </div>
  </section>

  <!-- ======================= SERVICES SECTION ======================= -->
  <section id="services" class="services-section">
    <div class="container">
      <div class="services-grid">
        <!-- Service 1 -->
        <div class="service-card card-3d">
          <div class="card-icon">🎬</div>
          <h3>الرسوميات المتحركة</h3>
          <p>إنتاج رسوميات متحركة احترافية وجذابة للفيديوهات والإعلانات</p>
          <div class="service-features">
            <span>✓ رسوميات 2D/3D</span>
            <span>✓ مقاطع فيديو</span>
            <span>✓ رسوميات ديناميكية</span>
          </div>
        </div>

        <!-- Service 2 -->
        <div class="service-card card-3d">
          <div class="card-icon">🎮</div>
          <h3>نماذج الألعاب</h3>
          <p>تصميم نماذج ثلاثية الأبعاد احترافية للألعاب والتطبيقات</p>
          <div class="service-features">
            <span>✓ شخصيات مفصلة</span>
            <span>✓ بيئات واقعية</span>
            <span>✓ تصاميم تفاعلية</span>
          </div>
        </div>

        <!-- Service 3 -->
        <div class="service-card card-3d">
          <div class="card-icon">🏭</div>
          <h3>التصميم الصناعي</h3>
          <p>نماذج ثلاثية الأبعاد للمنتجات الصناعية والآليات المعقدة</p>
          <div class="service-features">
            <span>✓ محاكاة هندسية</span>
            <span>✓ تصاميم دقيقة</span>
            <span>✓ عروض تقديمية احترافية</span>
          </div>
        </div>

        <!-- Service 4 -->
        <div class="service-card card-3d">
          <div class="card-icon">🏠</div>
          <h3>الفيزيولايزاشن المعماري</h3>
          <p>تصور معماري واقعي للمباني والفضاءات الداخلية</p>
          <div class="service-features">
            <span>✓ ديكور داخلي</span>
            <span>✓ إضاءة احترافية</span>
            <span>✓ مشاهد واقعية</span>
          </div>
        </div>

        <!-- Service 5 -->
        <div class="service-card card-3d">
          <div class="card-icon">👗</div>
          <h3>تصميم الملابس والموضة</h3>
          <p>نماذج ثلاثية الأبعاد للملابس والأزياء مع محاكاة الأنسجة</p>
          <div class="service-features">
            <span>✓ محاكاة النسيج</span>
            <span>✓ تصاميم فاشن</span>
            <span>✓ عروض أزياء</span>
          </div>
        </div>

        <!-- Service 6 -->
        <div class="service-card card-3d">
          <div class="card-icon">📦</div>
          <h3>تصميم العبوات والتغليف</h3>
          <p>تصميم احترافي للعبوات والتغليف ثلاثي الأبعاد</p>
          <div class="service-features">
            <span>✓ تصاميم مخصصة</span>
            <span>✓ محاكاة الطباعة</span>
            <span>✓ عروض منتجات</span>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Process Section -->
  <section class="process-section">
    <div class="container">
      <h2 class="section-title">عملية العمل</h2>
      
      <div class="process-timeline">
        <div class="timeline-item">
          <div class="timeline-number">1</div>
          <h3>الاستشارة</h3>
          <p>نستمع إلى احتياجاتك وفهم رؤيتك</p>
        </div>

        <div class="timeline-item">
          <div class="timeline-number">2</div>
          <h3>التصميم المفاهيمي</h3>
          <p>تطوير رسومات توضيحية أولية</p>
        </div>

        <div class="timeline-item">
          <div class="timeline-number">3</div>
          <h3>المراجعة والتعديل</h3>
          <p>تحسين التصميم بناءً على ملاحظاتك</p>
        </div>

        <div class="timeline-item">
          <div class="timeline-number">4</div>
          <h3>التسليم النهائي</h3>
          <p>تسليم المشروع بجودة احترافية</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Pricing Section -->
  <section class="pricing-section">
    <div class="container">
      <h2 class="section-title">الأسعار والباقات</h2>
      
      <div class="pricing-grid">
        <div class="pricing-card">
          <h3>الباقة الأساسية</h3>
          <div class="price">500 $</div>
          <ul class="features-list">
            <li>✓ تصميم 3D بسيط</li>
            <li>✓ عدد التعديلات: 2</li>
            <li>✓ وقت التسليم: 7 أيام</li>
            <li>✗ دعم 24/7</li>
          </ul>
          <a href="#contact" class="btn btn-secondary">اختر هذه الباقة</a>
        </div>

        <div class="pricing-card featured">
          <span class="badge">الأفضل</span>
          <h3>الباقة المتوسطة</h3>
          <div class="price">1500 $</div>
          <ul class="features-list">
            <li>✓ تصميم 3D متقدم</li>
            <li>✓ عدد التعديلات: 5</li>
            <li>✓ وقت التسليم: 5 أيام</li>
            <li>✓ دعم أولوي</li>
          </ul>
          <a href="#contact" class="btn btn-primary">اختر هذه الباقة</a>
        </div>

        <div class="pricing-card">
          <h3>الباقة الاحترافية</h3>
          <div class="price">3500 $</div>
          <ul class="features-list">
            <li>✓ تصاميم احترافية شاملة</li>
            <li>✓ عدد التعديلات: غير محدود</li>
            <li>✓ وقت التسليم: مخصص</li>
            <li>✓ دعم 24/7 كامل</li>
          </ul>
          <a href="#contact" class="btn btn-secondary">اختر هذه الباقة</a>
        </div>
      </div>
    </div>
  </section>

  <!-- ======================= ABOUT SECTION ======================= -->
  <section id="about" class="about-hero">
    <div class="container">
      <div class="about-grid">
        <div class="about-image">
          <img src="./img/team/3.png" style="border: none;" alt="فريقنا">
        </div>
        
        <div class="about-text">
          <h2>نحن فريق متخصص في التصميم ثلاثي الأبعاد</h2>
          <p>
            منذ تأسيسنا في عام 2018، كنا ملتزمين بتقديم خدمات تصميم ثلاثية الأبعاد عالية الجودة 
            لعملاء من مختلف الصناعات والقطاعات.
          </p>
          <p>
            فريقنا يتكون من مصممين ومهندسين ذوي خبرة عميقة في استخدام أحدث برامج التصميم 
            مثل Blender و Maya و 3ds Max والعديد من الأدوات المتقدمة الأخرى.
          </p>
          
          <div class="stats">
            <div class="stat">
              <h4>150+</h4>
              <p>مشروع منجز</p>
            </div>
            <div class="stat">
              <h4>50+</h4>
              <p>عميل راضي</p>
            </div>
            <div class="stat">
              <h4>8+</h4>
              <p>سنوات خبرة</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Team Section -->
  <section class="team-section">
    <div class="container">
      <h2 class="section-title">فريقنا المتميز</h2>
      
      <div class="team-grid">
        <div class="team-member">
          <img src="./img/team/2.jpg" alt="مصمم">
          <h3>محمود دهيس</h3>
          <p>مدير المشاريع والتصميم الرئيسي</p>
          <div class="member-skills">
            <span>Blender</span>
            <span>Maya</span>
            <span>Rendering</span>
          </div>
        </div>

        <div class="team-member">
          <img src="./img/team/1.jpg" alt="مصمم">
          <h3>أحمد دهيس</h3>
          <p>مصمم شخصيات وكائنات حية</p>
          <div class="member-skills">
            <span>Character Design</span>
            <span>Sculpting</span>
            <span>Animation</span>
          </div>
        </div>

        <div class="team-member">
          <img src="./img/team/2.jpg" alt="مصمم">
          <h3>محمود دهيس</h3>
          <p>متخصص التصميم الصناعي والمعماري</p>
          <div class="member-skills">
            <span>CAD</span>
            <span>Visualization</span>
            <span>Technical Design</span>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Values Section -->
  <section class="values-section">
    <div class="container">
      <h2 class="section-title">قيمنا الأساسية</h2>
      
      <div class="values-grid">
        <div class="value-card">
          <div class="value-icon">🎯</div>
          <h3>التميز</h3>
          <p>نسعى دائماً لتقديم أفضل جودة في كل مشروع</p>
        </div>

        <div class="value-card">
          <div class="value-icon">💡</div>
          <h3>الإبداع</h3>
          <p>نفكر بطرق مبتكرة لتحقيق رؤيتك</p>
        </div>

        <div class="value-card">
          <div class="value-icon">🤝</div>
          <h3>التعاون</h3>
          <p>نعمل بتعاون وثيق مع عملائنا</p>
        </div>

        <div class="value-card">
          <div class="value-icon">⏰</div>
          <h3>الالتزام بالمواعيد</h3>
          <p>نحترم وقتك وننجز المشاريع في الموعد</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Experience Section -->
  <section class="experience-section">
    <div class="container">
      <h2 class="section-title">خبرتنا والأدوات</h2>
      
      <div class="experience-grid">
        <div class="software-card">
          <h3>برامج التصميم</h3>
          <div class="software-list">
            <span>Blender</span>
            <span>Autodesk Maya</span>
            <span>3DS Max</span>
            <span>Cinema 4D</span>
            <span>ZBrush</span>
            <span>Substance Painter</span>
          </div>
        </div>

        <div class="software-card">
          <h3>مجالات التخصص</h3>
          <div class="software-list">
            <span>الألعاب</span>
            <span>الفيديو والإعلانات</span>
            <span>التصميم الصناعي</span>
            <span>العمارة والمباني</span>
            <span>الفاشن والملابس</span>
            <span>الرسوميات المتحركة</span>
          </div>
        </div>

        <div class="software-card">
          <h3>الصناعات</h3>
          <div class="software-list">
            <span>الترفيه والألعاب</span>
            <span>التسويق والإعلانات</span>
            <span>الهندسة والتصنيع</span>
            <span>العقارات</span>
            <span>الأزياء والموضة</span>
            <span>التعليم والتدريب</span>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ======================= CONTACT SECTION ======================= -->
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
              <p><a href="tel:+201015362440">+20 101 536 2440</a></p>
            </div>
          </div>

          <div class="contact-item">
            <div class="contact-icon">📧</div>
            <div>
              <h4>البريد الإلكتروني</h4>
              <p><a href="mailto:ahmeddahees7@gmail.com">ahmeddahees7@gmail.com</a></p>
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
                <option value="500-1000">500 - 1000 $</option>
                <option value="1000-2000">1000 - 2000 $</option>
                <option value="2000-5000">2000 - 5000 $</option>
                <option value="5000+">أكثر من 5000 $</option>
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
            <li><a href="/">الرئيسية</a></li>
            <li><a href="services.php">الخدمات</a></li>
            <li><a href="about.php">من نحن</a></li>
            <li><a href="contact.php">تواصل</a></li>
          </ul>
        </div>
        
        <div class="footer-section">
          <h4>تواصل معنا</h4>
          <p>البريد: ahmeddahees7@gmail.com/mahmodedahees1@gmail.com</p>
          <p>الهاتف: +20 1015362440 / 01024425128</p>
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
