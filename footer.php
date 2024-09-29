<footer class="footer__container">
  <div class="container__information">
    <div class="information__Logo">Eterno <span>Estagiário.</span></div>
    <div class="information_col_about">
      <h4>About</h4>
      <p>Blog com intuito de colocar dicas ou dificuldades que o autor passou...</p>
    </div>
    <div class="information_col">
      <h4>Categorias</h4>
      <ul><?php wp_list_categories(array('title_li' => '')); ?></ul>
    </div>
    <div class="information_col">
      <h4>Acessos Rápidos</h4>
      <ul>
        <li><a href="#">blabla</a></li>
      </ul>
    </div>
  </div>
  <div class="container__copyright">
    <p>&copy; <?php echo date('Y'); ?> <span class="copyright__text">Eterno Estagiário.</span> Todos os direitos reservados.</p>
  </div>
  <?php wp_footer(); ?>
</footer>
</body>

</html>