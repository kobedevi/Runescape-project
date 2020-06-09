<?php

use Illuminate\Database\Seeder;
use App\HomeBanner;

class HomebannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $banner = new HomeBanner();
        $banner->position = 'l';
        $banner->color = 'b';
        $banner->title_en = 'RUNESCAPE MOBILE EARLY ACCESS';
        $banner->title_nl = 'RUNESCAPE MOBIEL VROEGE TOEGANG';
        $banner->text_en = "<p>RuneScape Mobile Early Access is now available for all RuneScape players on Android.</p><p>Early Access is your chance to experience the magic of RuneScape on your mobile and with membership, grab the exclusive Mobile Founder's Pack.</p>";
        $banner->text_nl = "<p>RuneScape Mobile Early Access is nu beschikbaar voor alle RuneScape-spelers op Android.</p><p>Early Access is je kans om de magie van RuneScape op je mobiel te ervaren en met lidmaatschap, pak het exclusieve Mobile Founder's Pack.</p>";
        $banner->image = "sec1.jpg";
        $banner->save();

        $banner = new HomeBanner();
        $banner->position = 'r';
        $banner->color = 'b';
        $banner->title_en = "EXCLUSIVE FOUNDER'S PACK";
        $banner->title_nl = 'EXCLUSIEF OPRICHTERSPAK';
        $banner->text_en = "<p>Members who play RuneScape Mobile Early Access will be grandly rewarded with the exclusive Mobile Founder's Pack! It includes a Steel Panther Combat Pet, a unique rest animation and the dazzling Radiant Dawn Armour, so you'll look sensational as you're saving the world.</p>";
        $banner->text_nl = "<p>Leden die RuneScape Mobile Early Access spelen, worden beloond met het exclusieve Mobile Founder's Pack! Het bevat een Steel Panther Combat Pet, een unieke rustanimatie en het oogverblindende Radiant Dawn Armor, zodat je er sensationeel uitziet terwijl je de wereld redt.</p>";
        $banner->image = "sec2.jpg";
        $banner->save();

        $banner = new HomeBanner();
        $banner->position = 'l';
        $banner->color = 'd';
        $banner->title_en = "WE WANT TO HEAR FROM YOU";
        $banner->title_nl = 'WE WILLEN VAN JOU HOREN';
        $banner->text_en = "<p>Members who play RuneScape Mobile Early Access will be grandly rewarded with the exclusive Mobile Founder's Pack! It includes a Steel Panther Combat Pet, a unique rest animation and the dazzling Radiant Dawn Armour, so you'll look sensational as you're saving the world.</p>";
        $banner->text_nl = "<p>Leden die RuneScape Mobile Early Access spelen, worden beloond met het exclusieve Mobile Founder's Pack! Het bevat een Steel Panther Combat Pet, een unieke rustanimatie en het oogverblindende Radiant Dawn Armor, zodat je er sensationeel uitziet terwijl je de wereld redt.</p>";
        $banner->image = "sec3.jpg";
        $banner->save();
    }
}
