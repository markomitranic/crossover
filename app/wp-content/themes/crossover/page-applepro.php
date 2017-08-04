<?php 
/*
Template Name: Apple Pro Page Template
*/

get_header();
the_post();

?>

<main id="applepro">
    <section id="hero">
        <div class="wrapper">
            <h1><?=get_field('hero_title')?></h1>
            <p class="subtitle"><?=get_field('hero_subtitle')?></p>
            <a href="<?=get_field('hero_button_1_link')?>" class="btn" title="<?=get_field('hero_button_1_label')?>"><?=get_field('hero_button_1_label')?></a>
            <a href="<?=get_field('hero_button_2_link')?>" class="btn" title="<?=get_field('hero_button_2_label')?>"><?=get_field('hero_button_2_label')?></a>
        </div>
    </section>

    <section id="first">
        <div class="wrapper">
            <div class="text">
                <h2><?=get_field('first_section_title')?></h2>
	            <?=get_field('first_section_body')?>
                <a href="<?=get_category_link(get_field('first_program_pdf'))?>" class="big-button-with-icon pdf">Detaljan program kursa</a>
            </div>
            <div class="images">
                <div class="large" style="background-image: url('<?=get_field('large_image')['sizes']['large']?>');">
                    <img src="<?=get_field('large_image')['sizes']['large']?>" alt="<?=get_field('large_image')['alt']?>" class="large">
                </div>
                <div class="small" style="background-image: url('<?=get_field('small_image')['sizes']['medium']?>');">
                    <img src="<?=get_field('small_image')['sizes']['medium']?>" alt="<?=get_field('large_image')['alt']?>" class="small">
                </div>
            </div>
        </div>
    </section>

    <section id="second">
        <div class="wrapper">
            <div class="text">
                <h2><?=get_field('second_section_title')?></h2>
	            <?=get_field('second_section_body')?>
            </div>
            <div class="benfits-grid">
                <ul>

                    <?php foreach (get_field('benefits') as $benefit) :?>
                        <li>
                            <div style="background-image: url('<?=$benefit['icon']['sizes']['miniature']?>');"></div>
                            <p><span><?=$benefit['first_line']?></span><?=$benefit['additional_text']?></p>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </section>

    <section id="third">
        <div class="wrapper">
            <div class="image" style="background-image: url('<?=get_field('third_image')['sizes']['large']?>');">
                <img src="<?=get_field('third_image')['sizes']['large']?>" alt="<?=get_field('third_image')['alt']?>">
            </div>
            <h2><?=get_field('third_section_title')?></h2>
	        <?=get_field('third_section_body')?>
            <a href="<?=get_category_link(get_field('first_program_pdf'))?>" class="big-button-with-icon pdf">Detaljan program kursa</a>
        </div>
    </section>

    <section id="fourth">
        <div class="wrapper">
            <h2></h2>
            <div class="body">
                <div class="image" style="background-image: url('<?=get_field('fourth_image')['sizes']['large']?>');">
                    <img src="<?=get_field('fourth_image')['sizes']['large']?>" alt="<?=get_field('fourth_image')['alt']?>">
                </div>
                <div class="text">
					<?=get_field('fourth_section_body')?>
                </div>
            </div>
        </div>
    </section>

</main>

<footer>
    <section id="newsletter">
        <div class="wrapper">
            <div class="open-day">
                <h3>Sledeća otvorena vrata održavamo<br>22.03.2017 u 17 časova</h3>
                <p>Ukoliko imate neko pitanje ili želite da se prijavite za kurs, upišite svoje podatke ispod, i mi ćemo Vas kontaktirati!</p>
                <p>Otvorena vrata su namenjena upoznavanju uživo budućih polaznika sa profesorima i programom obuka i sertifikacije. </p>
            </div>
            <div class="newsletter">
                <form action="">
                    <input type="text" placeholder="Ime i Prezime*">
                    <input type="text" placeholder="Adresa e-pošte*">
                    <input type="text" placeholder="Broj telefona*">
                    <input type="text" placeholder="Dodatne informacije*">
                    <button>Submit</button>
                </form>
            </div>
        </div>
    </section>

<?php get_footer(); ?>