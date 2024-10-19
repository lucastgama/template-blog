<section class="container__ee jumbotron" id="home">
    <div class="jumbotron__information">
        <div class="information__text">
            <h3 class="section__title ">
                Eterno <span>estagiário</span> é um blog para informações
                <span>inrrelevantes</span> para pessoas mais inrrelevantes ainda.
            </h3>
            <p>
                Você já se sentiu perdido em meio a tantas informações irrelevantes?
                Bem-vindo ao clube! Neste blog, vamos piorar ainda mais essa situação com conteúdos ainda mais confusos, para que você possa ter uma noção real de como é trabalhar na programação.
            </p>
        </div>
        <div class="information__grid">
            <div class="information__grid__frist">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/JobHunt.png" alt="Procurando emprego" />
            </div>
            <div class="information__grid__second">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/CityAdventure.png" alt="Primeiro dia na cidade grande" />
            </div>
            <div class="information__grid__third">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/StudySession.png" alt="Meu dia de estudos" />
            </div>
        </div>
    </div>
    <div class="details">
        <div class="details__text">
            <p>
                Conteúdos do site para estagiários. Caso você não seja um, pressione Ctrl + W ou Command + W para explorar lugares mais importantes!
            </p>
            <div class="details__buttons">
                <a type="button" href="#posts" class="btnRound"> Sou estágiario </a>
                <a type="button" class="btnRoundGray">Não sou estágiario</a>
            </div>
        </div>
        <div class="details__info">
            <div class="info__container">
                <p><?php echo wp_count_posts()->publish; ?></p>
                <span>Tutoriais</span>
                <span class="info__lower_text">É, não vale a pena.</span>
            </div>
            <div class="info__container">
                <p><?php echo wp_count_comments()->total_comments; ?></p>
                <span>Comentários</span>
                <span class="info__lower_text">Como assim ?</span>
            </div>
            <div class="info__container">
                <p>0</p>
                <span>Estagiário Ajudados</span>
                <span class="info__lower_text">hum... faz sentido.</span>
            </div>
        </div>
    </div>
</section>