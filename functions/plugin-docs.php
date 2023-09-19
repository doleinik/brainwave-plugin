<h1>Документація</h1>
<div class="docs">

  <div>

    <h2>Збірка та запуск теми</h2>

    <details>
      <summary>Встановлення теми</summary>
      <ul>
        <li>
          <a href="/wp-content/plugins/brainwave/archives/theme.zip" download>Завантажити архів пустої теми</a>
          <ul>
            <li>
              Змініть в файлі <code>style.css</code><code>"Theme Name"</code> та <code>"Text Domain"</code> на назву
              активної теми
            </li>
            <li>
              Активувати тему треба зайшовши в адмін панель <code>Вигляд</code> та активувати встановлену тему
            </li>
          </ul>
        </li>
        <li>
          <a href="/wp-content/plugins/brainwave/archives/advanced-custom-fields-pro.zip" download>Завантажити
            обовьязковий плагін ACF PRO</a>
        </li>
      </ul>
    </details>

    <details>
      <summary>Обов'язкова структура теми</summary>
      <ul>
        <li>
          <code>-assets</code>
          <ul>
            <li>
              <code>-images</code> - папка з підключеними зображеннями
            </li>
            <li>
              <code>-src</code>
              <ul>
                <li>
                  <code>-styles</code> - папка з кастомними стилями які стосуються теми
                </li>
                <li>
                  <code>-scripts</code>- папка з кастомними скриптами які стосуються теми
                </li>
              </ul>
            </li>
          </ul>
        </li>
        <li>
          <code>-blocks</code>- папка з кастомними блоками
        </li>
        <li>
          <code>-components</code> - папка з кастомними компонентами
        </li>
        <!--      <li>-->
        <!--        <code>-parts</code> - папка з template-parts для теми-->
        <!--      </li>-->
        <!--      <li>-->
        <!--        <code>-templates</code> - папка з template сторінками для теми-->
        <!--      </li>-->
      </ul>
    </details>

    <details>
      <summary>Запуск збірки</summary>
      <ul>
        <li>
          Відкрийте папку <code>/plugins/brainwave/assembly/</code>
          <ul>
            <li>
              Змініть в файлі <code>config.json</code><code>"siteName"</code> та <code>"themeName"</code> на назву
              активної теми
            </li>
            <li>
              Відкрийте в терміналі папку <code>/plugins/brainwave/assembly/</code>
            </li>
            <li>
              Встановіть node_modules запустивши команду <code>npm i</code>
            </li>
            <li>
              Запустіть збірку командою <code>npm run dev</code>
            </li>
            <li>
              Готові стилі та скрипти створяться в папку <code>themes/<?= wp_get_theme() ?>/assets/</code> в назві буде
              префікс <code>bw-</code> і ці файли мініфікуються та автоматично підключаються
            </li>
          </ul>
        </li>
      </ul>
    </details>

    <details>
      <summary>Підключення шрифтів</summary>
      <ul>
        <li>
          Відкрийте папку <code>/plugins/brainwave/assembly/src/fonts</code>
        </li>
        <li>
          Закиньте в папку шрифти форматів <code>ttf</code>
        </li>
        <li>
          Відкрийте в терміналі папку <code>/plugins/brainwave/assembly/</code>
        </li>
        <li>
          Запустіть командою <code>npm run font</code>
        </li>
        <li>
          Готові шрифти закидуються в папку <code>themes/<?= wp_get_theme() ?>/assets/fonts/</code>
        </li>
        <li>
          Для підключення шрифтів створіть файл в <code>themes/<?= wp_get_theme() ?>/assets/src/styles/fonts.css</code>
        </li>
        <li>
          Підключыть шрифти в цьому файлі по приуладу <br>
          <code>
            @font-face {<br>
            font-family: 'font name';<br>
            src: url(../fonts/font name.ttf) format('ttf'), url(../fonts/font name.woff2) format('woff2');<br>
            font-weight: font weight;<br>
            }
          </code>
        </li>

        <li>
          Підключіть файл в <code>themes/<?= wp_get_theme() ?>/assets/src/styles/index.css</code> за допомогою <code>@import
            'font.css'</code>
        </li>
      </ul>
    </details>

    <details>
      <summary>Створення блоків</summary>
      <ul>
        <li>
          Відкриваєте папку <code>/wp-content/themes/<?= wp_get_theme() ?>/blocks/</code> та створюєте папку англійською
          мовою з
          маленької букви, від назви папки залежить назва блоку(- заміняється пробілом в адмінці), і в папці створюємо
          файл
          <code>index.php</code> це буде головний файл блоку
        </li>
        <li>
          В папці по потребі можна створити файл <code>index.css</code> куди записувати стилі що стосуються тільки даного
          блоку
        </li>
      </ul>
    </details>

    <details>
      <summary>Підключення модуля</summary>
      <ul>
        <li>
          Відкрити в консолі <code>brainwave/assembly/</code> та за допомогою <code>npm i</code> встановіть потрібний
          модуль
        </li>
        <li>
          Відкрийте папку <code>/wp-content/themes/<?= wp_get_theme() ?>/assets/</code>
        </li>
        <li>
          Для підключення стилів відкрийте файл <code>/wp-content/themes/<?= wp_get_theme() ?>
            /assets/src/styles/index.css</code>
        </li>
        <li>
          Для імпорту стилів робимо по прикладу <code>@import
            "../../../../../plugins/brainwave/assembly/node_modules/swiper/swiper-bundle.css";</code><br>
          Модуль знаходиться в папці плагіну тому шлях до цього модуля потрібно прописувати повний.<br>
          (Якщо не підключається превірте правильність шляху)
        </li>
        <li>
          Для підключення скриптів відкрийте файл <code>/wp-content/themes/<?= wp_get_theme() ?>
            /assets/src/scripts/</code>
          і відкрити відповідну папку та файл
        </li>
        <li>
          Для імпорту скриптів робимо по прикладу <code>import Swiper from
            '../../../../../../plugins/brainwave/assembly/node_modules/swiper';</code><br>
          Модуль знаходиться в папці плагіну тому шлях до цього модуля потрібно прописувати повний.<br>
          (Якщо не підключається превірте правильність шляху)
        </li>
      </ul>
    </details>

    <details>
      <summary>Допоміжні php функції для спрощення роботи</summary>
      <ul>
        <li>
          <code>renderUploadsSVG()</code> - функція виводу SVG з Uploads, для виводу SVG потрібно передати посилання на
          SVG
        </li>
        <li>
          <code>renderAssetsSVG()</code> - функція виводу SVG з Assets, для виводу SVG потрібно вказати шлях до файлу якщо
          є папка в аssets, або вказати тільки назву файлу
        </li>
        <li>
          <code>renderBlock()</code> - функція підключення блоку
        </li>
        <li>
          <code>renderComponent()</code> - функція підключення компоненту
        </li>
        <li>
          <code>renderImages()</code> - функція виводу шляху для зображення яке знаходиться в Assets теми
        </li>
        <li>
          <code>echoText()</code> - функція виводу екранованого тексту
        </li>

      </ul>
    </details>

    <details>
      <summary>Використання Tailwind resp-[] класів</summary>
      <ul>
        <li>
          Детальна документація <a href="https://tailwindcss.com/" target="_blank">Tailwind</a>
        </li>
        <li>
          Обов'язково використовувати <code>resp-[]</code> класи
          <ul>
            <li>
              <code>resp-[font/десктоп/мобайл]</code>- розмір шрифту
            </li>
            <li>
              <code>resp-[line-height/розмір потрібної висоти/розмір шрифту]</code>- розмір line-height тексту
            </li>
            <li>
              <code>resp-[w-max/десктоп/мобайл]</code>- розмір max-width
            </li>
            <li>
              <code>resp-[w-min/десктоп/мобайл]</code>- розмір min-width
            </li>
            <li>
              <code>resp-[width/десктоп/мобайл]</code>- розмір width
            </li>
            <li>
              <code>resp-[h-max/десктоп/мобайл]</code>- розмір max-height
            </li>
            <li>
              <code>resp-[h-min/десктоп/мобайл]</code>- розмір min-height
            </li>
            <li>
              <code>resp-[height/десктоп/мобайл]</code>- розмір height
            </li>
            <li>
              <code>resp-[px/десктоп/мобайл]</code>- відступи padding-left/padding-right
            </li>
            <li>
              <code>resp-[py/десктоп/мобайл]</code>- відступи padding-top/padding-bottom
            </li>
            <li>
              <code>resp-[pt/десктоп/мобайл]</code>- відступи padding-top
            </li>
            <li>
              <code>resp-[pr/десктоп/мобайл]</code>- відступи padding-right
            </li>
            <li>
              <code>resp-[pb/десктоп/мобайл]</code>- відступи padding-bottom
            </li>
            <li>
              <code>resp-[pl/десктоп/мобайл]</code>- відступи padding-left
            </li>
            <li>
              <code>resp-[mx/десктоп/мобайл]</code>- відступи margin-left/margin-right
            </li>
            <li>
              <code>resp-[my/десктоп/мобайл]</code>- відступи margin-top/margin-bottom
            </li>
            <li>
              <code>resp-[mt/десктоп/мобайл]</code>- відступи margin-top
            </li>
            <li>
              <code>resp-[mr/десктоп/мобайл]</code>- відступи margin-right
            </li>
            <li>
              <code>resp-[mb/десктоп/мобайл]</code>- відступи margin-bottom
            </li>
            <li>
              <code>resp-[ml/десктоп/мобайл]</code>- відступи margin-left
            </li>
            <li>
              <code>resp-[gap/десктоп/мобайл]</code>- відступи gap між flex елементами
            </li>
            <li>
              <code>resp-[gap-x/десктоп/мобайл]</code>- відступи gap-x між flex елементами
            </li>
            <li>
              <code>resp-[gap-y/десктоп/мобайл]</code>- відступи gap-y між flex елементами
            </li>
            <li>
              <code>resp-[right/десктоп/мобайл]</code>- позиція right елементу
            </li>
            <li>
              <code>resp-[top/десктоп/мобайл]</code>- позиція top елементу
            </li>
            <li>
              <code>resp-[bottom/десктоп/мобайл]</code>- позиція bottom елементу
            </li>
            <li>
              <code>resp-[left/десктоп/мобайл]</code>- позиція left елементу
            </li>
            <li>
              <code>resp-[svg-size/width десктоп/width мобайл/height десктоп/height мобайл]</code>- обов'язково
              прописувати
              цей клас на <code>div</code> обгортку svg елементу
            </li>
            <li>
              <code>resp-[svg-width/width десктоп/width мобайл]</code>- обов'язково прописувати
              цей клас на <code>div</code> обгортку svg елементу
            </li>
            <li>
              <code>resp-[svg-height/height десктоп/height мобайл]</code>- обов'язково прописувати
              цей клас на <code>div</code> обгортку svg елементу
            </li>
            <li>
              <code>resp-[translate/transform-x десктоп/transform-x мобайл/transform-y десктоп/transform-y мобайл]</code>-позиція
              translate:transform
            </li>
            <li>
              <code>resp-[translate-x/десктоп/мобайл]</code>-позиція translate:transformX
            </li>
            <li>
              <code>resp-[translate-y/десктоп/мобайл]</code>-позиція translate:transformY
            </li>
            <li>
              <code>resp-[grid-col/десктоп/мобайл]</code>-розмір grid елементів
            </li>
          </ul>
        </li>
      </ul>
    </details>
  </div>

<!--  <div>-->
<!--    <h2>Рекомендації по натяжкі</h2>-->
<!---->
<!--    <details>-->
<!--      <summary>Використання Tailwind resp-[] класів</summary>-->
<!--      <ul>-->
<!--        <li>-->
<!--          Детальна документація <a href="https://tailwindcss.com/" target="_blank">Tailwind</a>-->
<!--        </li>-->
<!--        <li>-->
<!--          Обов'язково використовувати <code>resp-[]</code> класи-->
<!--          <ul>-->
<!--            <li>-->
<!--              <code>resp-[font/десктоп/мобайл]</code>- розмір шрифту-->
<!--            </li>-->
<!--            <li>-->
<!--              <code>resp-[line-height/розмір потрібної висоти/розмір шрифту]</code>- розмір line-height тексту-->
<!--            </li>-->
<!--            <li>-->
<!--              <code>resp-[w-max/десктоп/мобайл]</code>- розмір max-width-->
<!--            </li>-->
<!--            <li>-->
<!--              <code>resp-[w-min/десктоп/мобайл]</code>- розмір min-width-->
<!--            </li>-->
<!--            <li>-->
<!--              <code>resp-[width/десктоп/мобайл]</code>- розмір width-->
<!--            </li>-->
<!--            <li>-->
<!--              <code>resp-[h-max/десктоп/мобайл]</code>- розмір max-height-->
<!--            </li>-->
<!--            <li>-->
<!--              <code>resp-[h-min/десктоп/мобайл]</code>- розмір min-height-->
<!--            </li>-->
<!--            <li>-->
<!--              <code>resp-[height/десктоп/мобайл]</code>- розмір height-->
<!--            </li>-->
<!--            <li>-->
<!--              <code>resp-[px/десктоп/мобайл]</code>- відступи padding-left/padding-right-->
<!--            </li>-->
<!--            <li>-->
<!--              <code>resp-[py/десктоп/мобайл]</code>- відступи padding-top/padding-bottom-->
<!--            </li>-->
<!--            <li>-->
<!--              <code>resp-[pt/десктоп/мобайл]</code>- відступи padding-top-->
<!--            </li>-->
<!--            <li>-->
<!--              <code>resp-[pr/десктоп/мобайл]</code>- відступи padding-right-->
<!--            </li>-->
<!--            <li>-->
<!--              <code>resp-[pb/десктоп/мобайл]</code>- відступи padding-bottom-->
<!--            </li>-->
<!--            <li>-->
<!--              <code>resp-[pl/десктоп/мобайл]</code>- відступи padding-left-->
<!--            </li>-->
<!--            <li>-->
<!--              <code>resp-[mx/десктоп/мобайл]</code>- відступи margin-left/margin-right-->
<!--            </li>-->
<!--            <li>-->
<!--              <code>resp-[my/десктоп/мобайл]</code>- відступи margin-top/margin-bottom-->
<!--            </li>-->
<!--            <li>-->
<!--              <code>resp-[mt/десктоп/мобайл]</code>- відступи margin-top-->
<!--            </li>-->
<!--            <li>-->
<!--              <code>resp-[mr/десктоп/мобайл]</code>- відступи margin-right-->
<!--            </li>-->
<!--            <li>-->
<!--              <code>resp-[mb/десктоп/мобайл]</code>- відступи margin-bottom-->
<!--            </li>-->
<!--            <li>-->
<!--              <code>resp-[ml/десктоп/мобайл]</code>- відступи margin-left-->
<!--            </li>-->
<!--            <li>-->
<!--              <code>resp-[gap/десктоп/мобайл]</code>- відступи gap між flex елементами-->
<!--            </li>-->
<!--            <li>-->
<!--              <code>resp-[gap-x/десктоп/мобайл]</code>- відступи gap-x між flex елементами-->
<!--            </li>-->
<!--            <li>-->
<!--              <code>resp-[gap-y/десктоп/мобайл]</code>- відступи gap-y між flex елементами-->
<!--            </li>-->
<!--            <li>-->
<!--              <code>resp-[right/десктоп/мобайл]</code>- позиція right елементу-->
<!--            </li>-->
<!--            <li>-->
<!--              <code>resp-[top/десктоп/мобайл]</code>- позиція top елементу-->
<!--            </li>-->
<!--            <li>-->
<!--              <code>resp-[bottom/десктоп/мобайл]</code>- позиція bottom елементу-->
<!--            </li>-->
<!--            <li>-->
<!--              <code>resp-[left/десктоп/мобайл]</code>- позиція left елементу-->
<!--            </li>-->
<!--            <li>-->
<!--              <code>resp-[svg-size/width десктоп/width мобайл/height десктоп/height мобайл]</code>- обов'язково-->
<!--              прописувати-->
<!--              цей клас на <code>div</code> обгортку svg елементу-->
<!--            </li>-->
<!--            <li>-->
<!--              <code>resp-[svg-width/width десктоп/width мобайл]</code>- обов'язково прописувати-->
<!--              цей клас на <code>div</code> обгортку svg елементу-->
<!--            </li>-->
<!--            <li>-->
<!--              <code>resp-[svg-height/height десктоп/height мобайл]</code>- обов'язково прописувати-->
<!--              цей клас на <code>div</code> обгортку svg елементу-->
<!--            </li>-->
<!--            <li>-->
<!--              <code>resp-[translate/transform-x десктоп/transform-x мобайл/transform-y десктоп/transform-y мобайл]</code>-позиція-->
<!--              translate:transform-->
<!--            </li>-->
<!--            <li>-->
<!--              <code>resp-[translate-x/десктоп/мобайл]</code>-позиція translate:transformX-->
<!--            </li>-->
<!--            <li>-->
<!--              <code>resp-[translate-y/десктоп/мобайл]</code>-позиція translate:transformY-->
<!--            </li>-->
<!--            <li>-->
<!--              <code>resp-[grid-col/десктоп/мобайл]</code>-розмір grid елементів-->
<!--            </li>-->
<!--          </ul>-->
<!--        </li>-->
<!--      </ul>-->
<!--    </details>-->
<!--  </div>-->
</div>
