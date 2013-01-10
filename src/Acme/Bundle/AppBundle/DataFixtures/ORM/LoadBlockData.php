<?php

namespace Came\Bundle\AppBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;

use Msi\Bundle\CmfBundle\Entity\PageBlock;

class LoadBlockData extends AbstractFixture implements ContainerAwareInterface, OrderedFixtureInterface
{
    protected $container;
    protected $manager;

    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    public function load(ObjectManager $manager)
    {
        $this->manager = $manager;

        $content = "<p>De nos jours, l’espace n’est plus le terrain de jeu exclusif des gouvernements et d’institutions officielles telles que la NASA ou l’ESA. Des sociétés privées l’ont mis à portée des civils, et plus particulièrement des voyageurs désirant repousser leurs limites, désirant repousser les limites terrestres.</p>
<p>Nous vous proposons un tout nouveau type de voyage : le tourisme spatial. Grâce à nos partenaires reconnus dont le sérieux dans le domaine n’est plus à remontrer, et en toute sécurité, UniktourSpace vous offre simplement de voyager dans l’espace.</p>
<p>Vous voyagerez seul avec un pilote certifié hautement expérimenté à bord d’une navette. En toute sécurité, profitez de votre vol spatial!</p>
<h3>Le tourisme spatial : une réalité</h3>
<p>Pour beaucoup, le tourisme spatial est un rêve. Qui n’a jamais imaginé flotter dans l’espace ou fouler le sol lunaire ? Des millions d’êtres humains se sont passionnés pour l’épopée spatiale de juillet 1969, ils ont vécu en direct le célébrissime “Un petit pas pour l’homme, un grand bond pour l’humanité” de Neil Armstrong. C’est avec la génération Apollo 11 que le désir d’espace s’est vraiment imposé, et aujourd’hui, cette limite que l’on croyait réservée aux Yuri Gagarine paraît plus que jamais franchissable.</p>
<p>Le rêve fou de voler, ce qui semblait une utopie il y a peine plus d’un siècle, est rapidement devenu un moyen de transport démocratisé, pratique et sécuritaire pour traverser de vastes étendues.</p>
<p>Il en sera de même avec le tourisme spatial: les coûts de production et les prix baisseront. Le tourisme spatial sera cependant toujours cher : à l’orée de 2020, on peut estimer le coût d'un tel voyage autour d'une dizaine de milliers de dollars.</p>
<p>Le marché pour un tel tourisme de luxe existe déjà : safari en Afrique australe en lodge de brousse, ascension de l'Everest... Il faudra bien sûr être en bonne santé et en bonne forme physique, mais il n'y a pas de contre indication majeure et tout le monde pourra partir un jour dans l'espace. Le tourisme spatial existe bel et bien et il est en pleine évolution !</p>
";
        $this->createText('Le concept d\'Uniktourspace', $content, 'content', 'page2');

        $content = "<p>La navette Lynx Mark II est un spationef particulier. SXC a sélectionné cet appareil pour ses spécificités techniques remarquables qui assurent confort et sécurité pour une expérience spatiale unique.</p>
<h3>Plus qu’un passager, vous êtes le co-pilote!</h3>
<p>Le Lynx n’a son bord que deux personnes : le pilote astronaute et vous-même, confortablement installé juste à sa droite. Vous voilà installé à la meilleure place, au cœur de l’action, avec un champ de vision incroyable. Il vous sera même attribué un vrai surnom de co-pilote : plus qu’un passager, vous faites véritablement partie de la mission!</p>
<h3>Un habitacle panoramique</h3>
<p>Nous assumons que vous ne souhaitez pas voyager si loin de notre vieille Terre pour simplement contempler celle-ci à travers un petit hublot.. C’est pourquoi l’habitacle du Lynx bénéficie d’une surface vitrée de 4m2, vous offrant le plus incroyable panorama du monde, et même au-delà.</p>
<h3>Une propulsion autonome</h3>
<p>Grâce aux 4 moteurs-fusées surpuissants, le Lynx ne dépend pas d’un vaisseau mère qui l’amènerait lentement dans la haute atmosphère : l’expérience débute dès le mise à feu des moteurs, à T+1.</p>
<p>Jugez par vous-mêmes : La navette atteint Mach 1 (la vitesse du son) à T +58 secondes, et Mach 2.9 à T +180 secondes.</p>
<h3>Spécificités techniques</h3>
<p>Longueur : 27.9 pi</p>
<p>Envergure : 24 pi</p>
<p>Hauteur : 7.22 pi</p>
<p>Passagers : 2 (pilote inclus)</p>
<p>Propulsion : 4 moteurs-fusées ré-allumables à combustible liquide XR-5K18</p>
<p>Poussée maximale : 11600 lbs</p>
<p>Surface de la canopée vitrée : 45.2 pi2</p>
<h3>Un engin écologique</h3>
<p>Beaucoup d’efforts ont été déployés pour concevoir une navette dont l’exploitation respecte l’environnement. Le Lynx est composé de matériaux légers, propulsé par des biocarburants et des moteurs à usage multiple. Ceux-ci peuvent soutenir jusqu’à 5000 vols, un chiffre inédit dans l’histoire du développement des fusées-moteur.</p>
<h3>Des moteurs ré-allumables</h3>
<p>Après avoir atteint l’altitude maximale (100km), le Lynx effectuera sa descente en planant dans un mouvement giratoire et moteurs coupés, le tout en douceur. Cependant, et spécificité unique de la navette, il est possible à tout moment de rallumer tout ou partie des 4 moteurs en plein vol. Soit un avantage indéniable en termes de sécurité et de flexibilité.</p>
<h3>Une plate-forme scientifique</h3>
<p>Pour presque chacun des vols qu’il effectuera, le Lynx emporte à son bord des programmes scientifiques informatisés. Si bien qu’alors que vous profitez pleinement de votre vol suborbital, occupé à contempler la courbe de la Terre, vous contribuez dans le même temps à la recherche scientifique et au progrès pour l’humanité.</p>";
        $this->createText('Description de la navette LYNX-2', $content, 'content', 'page8');

        $content = "<p>Voyager vite et en toute sécurité, deux exigences que les hommes se sont fixées dès l’orée des premiers vols en avion. Les innovations technologiques de ceux-ci, encore accélérées par les deux guerres mondiales du XXe siècle, ont abouti à un perfectionnement qui n’a fait que repousser les limites du possible. Cette aventure perdure aujourd’hui avec pour seul but de raccourcir les distances entre les hommes.</p>
<p>Les vols commerciaux qui font désormais partie de notre quotidien effréné, ne sont pourtant pas une finalité en soi sous leur forme actuelle. Des appareils toujours plus perfectionnés voient le jour, et la navette Lynx Mark II de SXC s’inscrit totalement dans cette lignée : le jour n’est pas loin où l’on pourra rallier New York à Dubaï en une heure à peine. Était-ce seulement imaginable il y a quelques années à peine, hormis dans les romans de science-fiction? C’est aujourd’hui un enjeu envisageable et tangible.</p>
<p>Après quoi, l’Histoire suivra son cours et de plus en plus de voyageurs utiliseront ce qui promet d’être le moyen de transport ultime. Serez-vous parmi les premiers élus? Le rêve est devenu possible!</p>
<p>C’est pleinement dans cette optique que nous vous offrons d’être un pionnier de l’Espace : l’un des premiers voyageurs à expérimenter ces conditions de vol exceptionnelles!</p>";
        $this->createText('Le futur des vols commerciaux', $content, 'content', 'page4');

        $content = "<p>Fondée en 1999 par quatre ingénieurs spécialistes de la propulsion aéronautique, XCor fut l’un des participants au fameux XPrize récompensant les avancées du tourisme spatial – projet dont le juge en chef est devenu pilote test du premier Lynx.</p>
<p>XCor Aerospace est par ailleurs l’un des fournisseurs de la NASA, notamment pour les équipements de propulsion et de guidage des navettes dans l’espace.</p>
<p>Le Lynx n’est pas le premier appareil de la société XCor Aerospace qui a déjà réalisé un avion à propulsion de moteurs fusées – le EZ Rocket – dont la technologie a été démontrée depuis 2001, notamment lors de manifestations aériennes et de vols test. L’un des objectifs du EZ était notamment de valider à de nombreuses reprises le principe de ré-allumage des moteurs qui garantit une sécurité maximale.</p>
<p>Xcor est actuellement la seule compagnie dans le monde capable de faire voler un avion avec une fusée réutilisable en plein vol (le pilote peut au besoin fermer la fusée et la rallumer) : c’est la particularité essentielle du Lynx Mark II, véhicule de votre futur vol spatial.</p>
<p>Xcor compte  en outre le plus grand nombre de vols tests propulsés par un moteur fusée. La compagnie compte également plus de 5000 mises à feu.</p>
<h3>Space Expedition Corporation (SXC)</h3>
<p>XCor attribue à SXC les droits de distribution internationaux exclusifs à chaque pays pour l’usage commercial privé des navettes Lynx. UniktourSpace est extrêmement fier d’en être le partenaire privilégié pour le Canada.</p>";
        $this->createText('Description de la compagnie XCore Aerospace - SXC', $content, 'content', 'page7');

        $content = "<p>Afin d’être complètement préparé à votre voyage spatial, vous avez la possibilité de participer à plusieurs missions d’entraînement optionnelles, en plus du programme déjà inclus.</p>
<p>Nous vous enseignerons tout ce qu’il est nécessaire de savoir avant de partir dans l’espace. Nos instructeurs professionnels ont développé des méthodes personnalisées et non contraignantes pour vous permettre de profiter au mieux de votre expédition spatiale, sans aucune appréhension.</p>
<h3>Vol en jet L-39 Albatross</h3>
<p>Le jet L-39 Albatross et un jet d’entraînement biplace qui vous placera dans des conditions de vol similaires à celles du Lynx Mark II. Installé dans le siège arrière, juste dans le dos du pilote, ce vol de simulation en appareil de haute technologie aérospatiale vous fera bénéficier d’un net avantage. En passant par les différents paliers de force gravitationnelle, vous aurez un aperçu fiable des sensations incroyables qui vous attendent durant le vol spatial.</p>
<h3>G-Centrifuge</h3>
<p>Durant votre entraînement dans la G-Centrifuge, vous ressentirez les effets de force gravitationnelle accrue durant les différentes phases du vol, jusqu’à 4.5 fois le niveau observé sur Terre. Plus important, nous vous apprendrons comme vous y préparer pour une tolérance optimale. Durant cette mission, vous prendrez place dans un petit habitacle attaché au bout d’un long bras mécanique qui effectue des mouvements circulaires à très haute vitesse. Nos instructeurs vous donneront tous les conseils et recommandations nécessaires pour vous accoutumer avec ces sensations, voire les apprécier!</p>
<h3>Vol en apesanteur</h3>
<p>Les vols en apesanteur ou vols paraboliques sont menés sur un appareil spécialement étudié à ces fins, en recréant les conditions de gravité nulle. Durant environ 20 secondes, l’appareil effectuera une manœuvre dénommée ‘parabole’ ; celle-ci peut être répétée entre 20 et 30 fois durant l’ensemble du vol. Pendant ces courtes périodes d’apesanteur, vous sentirez la même légèreté que connaissent les astronautes une fois dans l’espace. Capables alors de flotter en toute liberté dans la cabine, nous vous mettrons au défi d’effectuer quelques tâches banales en toute sécurité. Simplement une redécouverte de votre corps dans des conditions.. aériennes!</p>";
        $this->createText('Programme d\'entraînement', $content, 'content', 'page11');

        $content = "<h3>Le spatioport de Mojave</h3>
<p>Idéalement situé – à peine 2 heures de route de Los Angeles et 3 de Las Vegas, le Spatioport de Mojave est un point de départ parfait pour votre expédition spatiale. Les premiers voyages spatiaux de l’homme sont nés là-bas, dans les cieux qui surplombent le Mojave, tel cet exploit de Chuck Yeager, premier pilote à franchir le mur du son. De nombreux engins spatiaux y ont été conçus et développés par le passé et aujourd’hui, c’est le lieu privilégié où se déroulent différentes expérimentations aériennes et la majorité des vols tests aux Etats-Unis. En d’autres termes, l’endroit tout trouvé pour voyager dans l’espace avec SXC/UnikstourSpace!</p>
<h3>Le spatioport de Curaçao</h3>
<p>En plus de son emplacement stratégique et de ses infrastructures à la pointe, le centre de Curaçao s’annonce un authentique bijou architectural, et opérationnel dès janvier 2014! Dans l’écrin idyllique des paysages carribéens, entre plages de sable blanc et mer turquoise, ce futur centre s’annonce spectaculaire. Le climt optimal de Curaçao assure en outre les meilleures circonstances pour une mission spatiale comme la vôtre. Grâce aux hébergements de luxe que propose l’île et ses multiples activités dans une ambiance toute tropicale, vous pourriez bien même y élire domicile pour quelques jours de vacances.</p>";
        $this->createText('Les spatioports', $content, 'content', 'page15');

        $content = "<h3>Bienvenue au spatioport SXC</h3>
<p>Votre expérience spatiale débute dès votre arrivée à l’un de nos deux spatioports, à Curaçao ou à Mojave.</p>
<h3>Protocole avant le lancement</h3>
<p>Contrairement aux autres engins spatiaux déjà existants, comme la navette spatiale développée par la NASA, le Lynx Mark II est équipé d’un système indépendant de décollage et d’atterrissage. Les 4 moteurs révolutionnaires qui le propulsent dans l’espace peuvent être éteints et rallumés à tout moment. Nul besoin de réservoir externe, de rampe de lancement ou d’amerrissage. Le Lynx décolle simplement depuis la piste du spatioport, et atterrit en fin de vol sur une piste identique.</p>
<p>Assis aux côtés du pilote, vous prendrez part à la procédure habituelle de check list qui précède tout décollage. Après quoi les 4 moteurs démarrent : votre voyage spatial vient de commencer.</p>
<h3>T +58 secondes : le mur du son est passé</h3>
<p>Vous expérimenterez la poussée initiale du démarrage si familière aux pilotes de jets et de Formule 1. Avant même que vous en preniez conscience, le Lynx sera en pleine accélération. Le paysage de chaque côté de la piste de décollage se trouble dans des teintes vertes et bleutées avant l’ascension proprement dite. La vitesse s’accélère, le ciel se rapproche et s’assombrit. En moins d’une minute, vous franchissez le mur du son sur les traces de Chuck Yeager, premier homme à avoir accompli cet exploit en 1947.</p>
<h3>T +180 secondes : Plus vite que l’éclair</h3>
<p>Si le décollage est une véritable expérience en soi, et alors que vous sentirez profondément les effets de l’accélération lorsque les 4 moteurs sont à plein régime, la sensation devient encore plus intense à Mach 2.9, vitesse atteinte en 3 minutes. Même les pilotes de F16 ne réalisent que rarement cette performance.</p>
<h3>Coupure des moteurs</h3>
<p>A environ 60 km d’altitude, le pilote coupe les moteurs, et débute la phase de vol parabolique. Durant quelques minutes, vous serez assujetti à l’apesanteur, loin des forces gravitationnelles terrestres. La navette atteint alors son apogée à 103km d’altitude : la frontière spatiale se situant environ à ce palier, vous voilà officiellement un astronaute! En dépit de la lumière du Soleil, le ciel est d’un noir profond. En bas, vous avez tout loisir d’admirer la spectaculaire courbure de la Terre.</p>
<h3>Une descente toute en douceur</h3>
<p>Après 5 à 6 minutes dans l’espace, le Lynx entame sa descente vers notre chère planète. Il prendra rapidement de la vitesse, que le pilote réduira par d’habiles manœuvres face à la force gravitationnelle. Dès lors, l’engin planera en douceur dans un mouvement circulaire en direction de Curaçao ou Mojave, vous laissant toute latitude pour admirer le somptueux panorama de la Terre qui se rapproche peu à peu. Cette phase, qui dure de 20 à 25 minutes, est souvent assimilée au ‘vol de l’ange’, avant l’atterrissage fluide au spatioport. Votre vol inoubliable aura duré presque une heure.</p>";
        $this->createText('Le vol spatial', $content, 'content', 'page12');

        $content = "<h3>Vol spatial commercial : est-ce sécurisé?</h3>
<p>La sécurité est l’une de nos plus grandes priorités. Notre mission est de rendre l’espace accessible de manière sécurisée et fiable, même si nous reconnaissons que nous allons quelque part où peu de gens sont allés avant. En ce qui concerne les risques, nous sommes totalement convaincus de pouvoir tous les réduire à un niveau minime en prenant les précautions nécessaires : vous profiterez de votre spatial en toute sérénité.</p>
<h3>Caractéristiques de sécurité du Lynx Mark II</h3>
<p>Notre objectif est de rendre les vols spatiaux commerciaux aussi sécurisés que l’aviation commerciale, actuellement le moyen de transport le plus sûr. À cet effet, un système de sauvegarde de sécurité est disponible pour d’éventuelles anomalies ou défaillances. Naturellement, nous espérons ne pas avoir besoin de les utiliser! Comparez-le à porter une ceinture de sécurité dans votre voiture : vous vous attachez en espérant ne pas en avoir besoin. Toutes ces caractéristiques mènent les opérations spatiales commerciales vers un niveau supérieur de sécurité.</p>
<h3>8 raisons choisir SXC</h3>
<p>Vous pouvez être rassuré, le voyage dans l’espace avec SXC est fiable, pour les 8 raisons suivantes :</p>
<ol>
<li><strong>Les moteurs de fusées sont sécurisés et ont été  largement testés</strong><br>Le développement des moteurs de fusées Lynx a été achevé en mai 2010. Depuis, de nombreux tests ont été effectués rigoureusement, sans aucun accident reporté à date en phase finale.</li>
<li><strong>Construisant des moteurs de fusées depuis 1999, la société XCOR a une excellente réputation et une grande expérience</strong><br>
XCOR a une empreinte de sécurité sans précèdent. Nous pouvons affirmer sans risque qu’elle est le leader mondial dans le commerce des moteurs de fusées réutilisables. XCOR a fait plus de tests de fusées que quiconque, sans accident. Dans les 10 dernières années, cette société a tiré et arrêté en toute sécurité ses moteurs de fusées plus de 5 000 fois. De plus, elle a effectué 66 vols dans 2 avions différents propulsés par les moteurs de fusées XCOR.</li>
<li><strong>Le Lynx Mark II n’a pas un, mais quatre moteurs de fusées</strong><br>
Le Lynx possède quatre moteurs de fusées. Dans le cas où l’un d’entre eux subit une défaillance à mi-vol, la navette spatiale est conçue pour effectuer normalement son vol avec seulement 3 moteurs en fonction. Même si deux ou même trois moteurs venaient à être défectueux, ce qui très hautement improbable, nous pourrions rester en l’air aussi longtemps que nécessaire afin d’effectuer un retour en toute sécurité.</li>
<li><strong>Les moteurs de fusées Lynx peuvent s’arrêter et redémarrer pendant le vol</strong><br>
Les moteurs de fusées Lynx sont spécialement conçus pour  s’arrêter et redémarrer au milieu d’un vol, autant de fois que nécessaire. En redescendant vers la Terre, ceci nous permet d’effectuer une remise des gaz en cas au cas où l’atterrissage serait impossible dans le délai imparti (Par exemple, à cause d’une quelconque obstruction sur la piste).</li>
<li><strong>Le lynx décolle comme un avion normal, seulement plus vite</strong><br>
Le Lynx décolle comme un avion normal, depuis une piste ordinaire.
Grâce à ce type de décollage, nous avons l’opportunité de tester les moteurs des fusées en toute sécurité sur le sol avant le lancement de la navette. Le pilote et les techniciens surveilleront de près tous les procédures lors du démarrage. Si celles-ci  n’était pas opérationnelles à 100% lors du décollage, le pilote peut simplement éteindre les moteurs et simplement rester sur le sol le temps de régler les problèmes.</li>
<li><strong>Tous les astronautes portent des combinaisons pressurisées</strong><br>
Tous les astronautes de SXC portent des combinaisons pressurisées. Dans le cas peu probable où la pression du cockpit venait à chuter, les combinaisons pressurisées fournissent une pression d’air et de l’oxygène en quantité suffisante pour survivre au-dessus de l’altitude la plus élevée que la fusée Lynx doit atteindre durant le vol. Cette dernière caractéristique existe aussi dans les avions commerciaux, où les masques à oxygène tombent dans le cas d’une perte accidentelle de pression dans la cabine.</li>
<li><strong>Tous les astronautes ont un parachute et un mode d’évacuation</strong><br>
 Dans la situation très peu probable où les choses vont mal et où les systèmes principaux échouent, le Lynx possède deux ultimes caractéristiques de sécurité : le siège éjectable et les parachutes. Les astronautes seraient capables de quitter le vaisseau et de rejoindre la Terre en parachute sans dommage.</li>
<li><strong>SXC et XCOR ont une totale expertise en matière de sécurité</strong><br>
En tant que partenaire de KLM, qui dispose des meilleurs programmes de sécurité de vol au monde, SXC bénéficie de cette expertise et applique tous les credos sécuritaires des vols commerciaux à la sécurité des voyages dans l’espace. Par ailleurs, SXC peut s’appuyer sur sa collaboration étroite avec la Royal Air Force néerlandaise (RNLAF). En matière de sécurité, cette dernière dispose de l’un des meilleurs bilans de vol F16 au cours des trois dernières décennies. Le lieutenant général (retraité) Ben Droste et Harry Van Hulten (notre pilote principal et pilote test) feront en sorte que nous appliquions tous les aspects importants de la sécurité des vols militaires à nos activités commerciales dans l’espace.</li>
</ol>";
        $this->createText('Sécurité', $content, 'content', 'page14');

        $content = "<p><strong>Pourrais-je faire de la plongée le jour qui précède ou qui suit le vol dans l’espace?</strong><br>
Pas la veille, ce type d’activité étant déconseillé avant tout type de vol (commercial ou spatial) et vous serez bien assez occupé avec notre programme de formation! De plus, nous devrons probablement ajouter quelques heures en raison du profil important du vol. Plonger le jour d’après n’est pas un problème bien que vous pourriez vous attendre à ressentir quelques effets dus à votre voyage dans l’espace.</p>
<p><strong>Combien de personnes voyageront avec moi dans l’espace?</strong><br>
Pas un seul. Vous serez le seul passager, assis à côté du pilote.</p>
<p><strong>Combien de sessions d’entraînement y aura-t-il?</strong><br>
Nous mettrons à votre disposition 4 ou 5 séances d’entraînements, celles-ci ne sont pas obligatoires mais nous vous recommandons d’y participer.</p>
<p><strong>Quelle quantité d’oxygène y aura-t-il à bord de la navette d’XCOR ?</strong><br>
Chaque vol contiendra 1872 kg d’oxygène liquide.</p>
<p><strong>Comment est le bilan d’XCOR?</strong><br>
XCOR a construit onze générations de moteurs de fusées depuis 1990. Ils ont fait décoller de la piste plus de 3500 fusées et achevé 66 vols avec deux différents types de fusées.</p>
<p><strong>Est-ce sécurisé de décoller avec ce type de fusée?</strong><br>
Décoller grâce aux moteurs de la fusée est tout aussi sécurisé que n’importe quel autre mode de décollage. Ce type de lancement est similaire à un avion de chasse qui décolle grâce à des dispositifs de postcombustion. Avant le décollage de la navette spatiale, le pilote vérifie les performances du moteur de la fusée. Ainsi, les marges de sécurité sont augmentées puisque ce contrôle a lieu alors que la navette spatiale est encore au sol. Si quelque chose fonctionne mal, le pilote pourra ainsi annuler le décollage, exactement comme pour les avions commerciaux. Dans ce cas, nous vérifierons les moteurs et programmerons un autre vol dès que possible. </p>
<p><strong>Comment dois-je me vêtir le jour de l’expédition? Devrais-je porter une combinaison spéciale?</strong><br>
Oui, vous devrez porter une combinaison spatiale et un casque adapté qui vous seront fournis.</p>
<p><strong>Quelles sont les formalités obligatoires pour avoir le droit de participer à l’expédition spatiale à bord de la navette décollant de</strong><br>Curaçao?
Toute personne âgée au minimum de 18 ans et physiquement et mentalement en bonne santé sera autorisée à voyager avec nous dans l’espace. Nous avons besoin que l’astronaute ait fourni tous ses antécédents médicaux (des 5 dernières années) dans les 7 jours qui suivent la signature du contrat. De plus, nous obligeons le passager à subir un examen médical prévu par la SXC. En résumé, toute personne qui n’a pas de sérieux problèmes de cœur, ou une pression sanguine extrêmement élevée et qui ne présente aucun signe d’épilepsie peut monter à bord de la navette XCOR Lynx.</p>
<p><strong>Quelle est la durée du vol dans l’espace?</strong><br>
L’expédition durera une heure entière, si ce n’est un peu plus longtemps.</p>
<p><strong>Quel est l’âge minimum requis pour une personne qui souhaite voyager dans l’espace avec SXC?</strong><br>
L’âge minimum est de 18 ans.</p>
<p><strong>Quelle expérience sera la plus mémorable dans mon vol spatial?</strong><br>
  Bien que la plupart des gens répondent instinctivement l’apesanteur, chacun des 500 astronautes qui a été dans l’espace jusqu’à aujourd’hui témoigne que l’expérience la plus mémorable est en fait de voir la planète Terre au milieu d’un ciel extrêmement noir. Ils affirment même que c’est une expérience qui change la vie.</p>
<p><strong>Qui est XCOR?</strong><br>
XCOR Aerospace est une société basée dans le désert de Mojave en Californie, qui s’occupe du développement et de la production de moteurs de fusées réutilisables qui s’avèrent être fiables et sécurisés. De plus, XCOR développe des systèmes de propulsion avancés, des composites non inflammables ainsi que d’autres technologies habilitantes. La société XCOR travaille sur les systèmes de propulsion principaux en collaboration avec les principaux entrepreneurs de l’aérospatiale et des clients gouvernementaux. Elle construit actuellement le Lynx, une fusée à moteur deux places, entièrement réutilisable et qui décolle et atterrit horizontalement. Cette fusée est destinée à  répondre à trois objectifs principaux : le lancement de micro et nano satellites, la recherche et les missions scientifiques, ainsi que les vols spatiaux privés. Les modèles de production Lynx (désignés Lynx Mark II) sont conçus pour être robustes. Ils sont attribués à plusieurs missions et sont capables de voler jusqu’à plus de 100 km d’altitude, et ce 4fois par jour. </p>
<p><strong>Pourquoi cette expérience spatiale qui changera ma vie?</strong><br>
Voir la planète Terre d’en haut démontre de façon frappante le caractère unique mais aussi la vulnérabilité de notre planète dans le système solaire et au-delà. Cette prise de conscience vous accompagnera pour le reste de votre vie et vous aidera à remplir votre part de responsabilité dans un environnement sain. </p>
";
        $this->createText('FAQ', $content, 'content', 'page5');

        $manager->flush();
    }

    public function createText($name, $body, $slot = 'content', $page = null)
    {
        $block = new PageBlock();
        $this->container->get('msi_cmf.page_block_manager')->createTranslations($block, ['fr']);

        $block
            ->setName($name)
            ->setType('text')
            ->setSetting('slot', $slot)
        ;
        $block->getTranslation()
            ->setPublished(true)
            ->setSetting('body', $body);
        if ($page) {
            $block->getPages()->add($this->manager->merge($this->getReference($page)));
        }
        $this->manager->persist($block);
    }

    public function getOrder()
    {
        return 6;
    }
}
