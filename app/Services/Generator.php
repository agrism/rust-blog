<?php

namespace App\Services;

class Generator
{
    public static function get(?string $id = null): array
    {
        $return = [
            [
                'id'=> 1,
                'title' => 'Porziņģis ciemos pie čempiones "Warriors", Kalifornijā spēle arī Girgensonam',
                'content' => <<<HTML

<p>Nacionālajā basketbola asociācijā Kristapa Porziņģa pārstāvētā Vašingtonas "Wizards" plkst. 5.00 pēc Latvijas laika viesosies pie Goldensteitas "Warriors", bet Nacionālajā hokeja līgā Zemgus Girgensona pārstāvētā Bufalo "Sabres" pusstundu vēlāk tiksies ar Losandželosas "Kings".</p>

<p>Vašingtonas "Wizards" trīs spēļu izbraukumu pirms Zvaigžņu spēles pauzes sāks pret čempioni Goldensteitas "Warriors", kurai pirms mēneša mājās piekāpās ar 118:127.</p>

<p>Toreiz 41 punktu "Warriors" labā guva Stefens Karijs, kurš nesen gan iedzīvojās savainojumā un izlaidīs arī Zvaigžņu spēli. Šosezon Karijam ir vidēji 29,4 punkti, 6,4 rezultatīvas piespēles, 6,3 atlēkušās bumbas.</p>

<p>Nākamie rezultatīvākie komandā ir Klejs Tompsons (21,4p, 3,9ab, 2,4rp) un Džordans Pūls (20,9p, 4,5rp, 2,8ab), bet zem groziem visvairāk bumbu vāc Kevons Lūnijs (6,6p, 8,6ab, 2,6rp).</p>

<p>"Warriors" bez Karija piedzīvojusi divus zaudējumus pēc kārtas, bet "Wizards" vispirms sešu uzvaru sēriju nomainīja pret trim zaudējumiem, bet nu svinējusi divas uzvaras pēc kārtas.</p>

<p>Kristaps Porziņģis kopš atgriešanās laukumā sešās spēlēs sakrājis vidēji 26,3 punktus, 8,0 atlēkušās bumbas, 3,5 rezultatīvas piespēles un 2,0 bloķētus metienus.</p>

<p>"Wizards" pagaidām nav skaidrības par Kaila Kuzmas dalību – viņa spēlēšana ir zem jautājuma zīmes.</p>
<p>Abas komandas savās konferencēs ieņem devīto vietu – "Warriors" Rietumu konferencē ar 28-28 un "Wizards" Austrumu konferencē ar 26-29.</p>
<p>"Warriors" ir izteikta mājas komanda, savā laukumā šosezon uzvarot 75% spēļu un viesos – 25% (pretējas bilances 21-7 un 7-21). "Wizards" viesos ir 42% uzvaru (11-15).</p>

<p>Pabeigusi piecu spēļu izbraukumu, mājās atgriezīsies Dalasas "Mavericks", kas uzņems Minesotas "Timberwolves". Savainotais Dāvis Bertāns joprojām nespēlēs.</p>
HTML,
            ],
            [
                'id'=> 2,
                'title' => 'Venezia somu uzbrucējs pēc nomaiņas B sērijas mačā veldzējas ar alus glāzi',
                'content' => <<<HTML
<p>Itālijas B sērijas kluba ''Venezia'' somu uzbrucējs Joels Pohjanpalo pēc nomaiņas 81. minūtē aizvadītās nedēļas nogales mačā pret Ferrāras ''Spal'', dodoties uz rezervistu soliņu, veldzējās ar alus glāzi un neatteica pašbildi kluba līdzjutējiem. Venēcieši Itālijas pēc spēka otrās līgas 24. kārtas mačā savā laukumā triumfēja ar 2:1, bet Pohjanpalo abos vārtu guvumos izcēlās ar rezultatīvu piespēli.</p>

HTML,
            ],
            [
                'id'=> 3,
                'title' => 'Uzbrukumā vēl viens Marko - vicečempione "Riga" Ķīnā atrod horvātu',
                'content' => <<<HTML
<p>Latvijas futbola vicečempione "Riga" pavēstījusi par 25 gadus vecā horvātu centra uzbrucēja Marko Dabro pievienošanos komandai. Viņš šosezon tiks īrēts no Ķīnas septītā spēcīgākā kluba Pekinas "Guoan".</p>

<p>2013. gadā "Cibalia" audzēknis Dabro pārcēlās uz zināmā Itālijas kluba "Fiorentina" sistēmu. 2016. gadā Marko atgriezās "Cibalia", aizvadīja divas sezonas Horvātijas augstākajā līgā un 41 spēlē iesita piecus vārtus. Pēc tam Dabro spēlēja Horvātijas klubā "Gorica" un Slovēnijas "Bravo", bet 2019. gadā parakstīja līgumu ar Horvātijas otrās spēcīgākās līgas klubu "Bijelo Brdo".</p>

<p>Šajā komandā Marko aizvadīja 49 spēles un izcēlās ar iespaidīgiem 40 vāŗtiem. 2021./2022. gada sezonā Marko spēlēja Horvātijas augstākās līgas klubā "Lokomotiv Zagreb" un iesita 13 vārtus 27 spēlēs. 2022. gada vasarā Ķīnas augstākās līgas klubs "Beijing Guoan" samaksāja vienu miljonu eiro, taču Ķīnā Marko pussezonas laikā 17 spēlēs iesita tikai vienus vārtus un atdeva divas rezultatīvas piespēles.</p>

<p>"Riga" šoziem jau ir paziņojusi par centra uzbrucēju Marko Regžas, Marko Dabro un Meleja Diaņa pievienošanos komandai, savainojumu dziedē Ranžels, bet treniņnometnē Turcijā manāms arī brazīlietis Režinaldu Ramiriss, kurš Kipras augstākās līgas klubā "Akritas" šosezon 15 spēlēs guvis trīs vārtus. Tikmēr Regžas iepriekšējais klubs Salaspils "Super Nova" pavēstījis par Jevgeņija Miņina, Kristiāna Sprukuļa un Aļģirda Graža palikšanu komandā.</p>
HTML,
            ],
        ];

        if(!$id){
            return $return;
        }

        $found = null;

        foreach ($return as $item){
            if($item['id'] == $id){
                $found =$item;
                break;
            }
        }

        return $found;
    }
}
