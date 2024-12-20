<?php
function renderHamburger($language)
{
    echo '<input type="checkbox" id="menu-btn" class="menu-btn">';
    echo '<label for="menu-btn" class="menu-icon">';
    echo '<span class="navicon"></span>';
    echo '</label>';
    echo '<ul class="menu">';
    echo '<li><a href="/about?lang=' . htmlspecialchars($language) . '">' . ($language === 'DE' ? 'Über uns' : 'About Us') . '</a></li>';
    echo '<li><a href="/development?lang=' . htmlspecialchars($language) . '">' . ($language === 'DE' ? 'Entwicklung' : 'Development') . '</a></li>';
    echo '<li><a href="/consulting?lang=' . htmlspecialchars($language) . '">' . ($language === 'DE' ? 'Beratung' : 'Consulting') . '</a></li>';
    echo '<li><a href="/services?lang=' . htmlspecialchars($language) . '">' . ($language === 'DE' ? 'Leistungen' : 'Services') . '</a></li>';
    echo '<li><a href="/blog?lang=' . htmlspecialchars($language) . '">' . ($language === 'DE' ? 'Blog' : 'Blog') . '</a></li>';
    echo '</ul>';
}
