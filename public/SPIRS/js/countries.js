var countries = [
    {
      'ru': 'Россия',
      'uz-ln': 'Rossiya',
      'uz-cl': 'Россия',
    },
    {
      'ru': 'Украина',
      'uz-ln': 'Ukraina',
      'uz-cl': 'Украина',
    },
    {
      'ru': 'Абхазия',
      'uz-ln': 'Abxaziya',
      'uz-cl': 'Абхазия',
    },
    {
      'ru': 'Австралия',
      'uz-ln': 'Avstraliya',
      'uz-cl': 'Австралия',
    },
    {
      'ru': 'Австрия',
      'uz-ln': 'Avstriya',
      'uz-cl': 'Австрия',
    },
    {
      'ru': 'Азербайджан',
      'uz-ln': 'Ozarbayjon',
      'uz-cl': 'Озарбайжон',
    },
    {
      'ru': 'Албания',
      'uz-ln': 'Albaniya',
      'uz-cl': 'Албания',
    },
    {
      'ru': 'Алжир',
      'uz-ln': 'Jazoir',
      'uz-cl': 'Жазоир',
    },
    {
      'ru': 'Ангола',
      'uz-ln': 'Angola',
      'uz-cl': 'Ангола',
    },
    {
      'ru': 'Ангуилья',
      'uz-ln': 'Anguilla',
      'uz-cl': 'Ангуилла',
    },
    {
      'ru': 'Андорра',
      'uz-ln': 'Andorra',
      'uz-cl': 'Андорра',
    },
    {
      'ru': 'Антигуа и Барбуда',
      'uz-ln': 'Antigua va Barbuda',
      'uz-cl': 'Антигуа ва Барбуда',
    },
    {
      'ru': 'Антильские о-ва',
      'uz-ln': 'Antillalar',
      'uz-cl': 'Антиллалар',
    },
    {
      'ru': 'Аргентина',
      'uz-ln': 'Argentina',
      'uz-cl': 'Аргентина',
    },
    {
      'ru': 'Армения',
      'uz-ln': 'Armaniston',
      'uz-cl': 'Арманистон',
    },
    {
      'ru': 'Арулько',
      'uz-ln': 'Arulco',
      'uz-cl': 'Арулcо',
    },
    {
      'ru': 'Афганистан',
      'uz-ln': "Afg'oniston",
      'uz-cl': 'Афғонистон',
    },
    {
      'ru': 'Багамские о-ва',
      'uz-ln': 'Bahamas',
      'uz-cl': 'Баҳамас',
    },
    {
      'ru': 'Бангладеш',
      'uz-ln': 'Bangladesh',
      'uz-cl': 'Бангладеш',
    },
    {
      'ru': 'Барбадос',
      'uz-ln': 'Barbados',
      'uz-cl': 'Барбадос',
    },
    {
      'ru': 'Бахрейн',
      'uz-ln': 'Bahrayn',
      'uz-cl': 'Баҳрайн',
    },
    {
      'ru': 'Беларусь',
      'uz-ln': 'Belarus',
      'uz-cl': 'Беларус',
    },
    {
      'ru': 'Белиз',
      'uz-ln': 'Beliz',
      'uz-cl': 'Белиз',
    },
    {
      'ru': 'Бельгия',
      'uz-ln': 'Belgiya',
      'uz-cl': 'Белгия',
    },
    {
      'ru': 'Бенин',
      'uz-ln': 'Benin',
      'uz-cl': 'Бенин',
    },
    {
      'ru': 'Бермуды',
      'uz-ln': 'Bermuda',
      'uz-cl': 'Бермуда',
    },
    {
      'ru': 'Болгария',
      'uz-ln': 'Bolgariya',
      'uz-cl': 'Болгария',
    },
    {
      'ru': 'Боливия',
      'uz-ln': 'Boliviya',
      'uz-cl': 'Боливия',
    },
    {
      'ru': 'Босния/Герцеговина',
      'uz-ln': 'Bosniya / Gertsegovina',
      'uz-cl': 'Босния / Герцеговина',
    },
    {
      'ru': 'Ботсвана',
      'uz-ln': 'Botswana',
      'uz-cl': 'Боцwана',
    },
    {
      'ru': 'Бразилия',
      'uz-ln': 'Braziliya',
      'uz-cl': 'Бразилия',
    },
    {
      'ru': 'Британские Виргинские о-ва',
      'uz-ln': 'Britaniya Virjiniya orollari',
      'uz-cl': 'Британия Виржиния ороллари',
    },
    {
      'ru': 'Бруней',
      'uz-ln': 'Bruney',
      'uz-cl': 'Бруней',
    },
    {
      'ru': 'Буркина Фасо',
      'uz-ln': 'Burkina Faso',
      'uz-cl': 'Буркина Фасо',
    },
    {
      'ru': 'Бурунди',
      'uz-ln': 'Burundi',
      'uz-cl': 'Бурунди',
    },
    {
      'ru': 'Бутан',
      'uz-ln': 'Butan',
      'uz-cl': 'Бутан',
    },
    {
      'ru': 'Валлис и Футуна о-ва',
      'uz-ln': 'Wallis va Futuna orollari',
      'uz-cl': 'Wаллис ва Футуна ороллари',
    },
    {
      'ru': 'Вануату',
      'uz-ln': 'Vanuatu',
      'uz-cl': 'Вануату',
    },
    {
      'ru': 'Великобритания',
      'uz-ln': 'Buyuk Britaniya',
      'uz-cl': 'Буюк Британия',
    },
    {
      'ru': 'Венгрия',
      'uz-ln': 'Vengriya',
      'uz-cl': 'Венгрия',
    },
    {
      'ru': 'Венесуэла',
      'uz-ln': 'Venesuela',
      'uz-cl': 'Венесуела',
    },
    {
      'ru': 'Восточный Тимор',
      'uz-ln': 'Sharqiy Timor',
      'uz-cl': 'Чарқий Тимор',
    },
    {
      'ru': 'Вьетнам',
      'uz-ln': 'Vetnam',
      'uz-cl': 'Ветнам',
    },
    {
      'ru': 'Габон',
      'uz-ln': 'Gabon',
      'uz-cl': 'Габон',
    },
    {
      'ru': 'Гаити',
      'uz-ln': 'Gaiti',
      'uz-cl': 'Гаити',
    },
    {
      'ru': 'Гайана',
      'uz-ln': 'Guyana',
      'uz-cl': 'Гуяна',
    },
    {
      'ru': 'Гамбия',
      'uz-ln': 'Gambiya',
      'uz-cl': 'Гамбия',
    },
    {
      'ru': 'Гана',
      'uz-ln': 'Gana',
      'uz-cl': 'Гана',
    },
    {
      'ru': 'Гваделупа',
      'uz-ln': 'Guadeloupe',
      'uz-cl': 'Гуаделоупе',
    },
    {
      'ru': 'Гватемала',
      'uz-ln': 'Gvatemalada',
      'uz-cl': 'Гватемалада',
    },
    {
      'ru': 'Гвинея',
      'uz-ln': 'Gvineya',
      'uz-cl': 'Гвинея',
    },
    {
      'ru': 'Гвинея-Бисау',
      'uz-ln': 'Guinea bissau',
      'uz-cl': 'Гуинеа биссау',
    },
    {
      'ru': 'Германия',
      'uz-ln': 'Germaniya',
      'uz-cl': 'Германия',
    },
    {
      'ru': 'Гернси о-в',
      'uz-ln': 'Guernsey',
      'uz-cl': 'Гуернсей',
    },
    {
      'ru': 'Гибралтар',
      'uz-ln': 'Gibraltar',
      'uz-cl': 'Гибралтар',
    },
    {
      'ru': 'Гондурас',
      'uz-ln': 'Gonduras',
      'uz-cl': 'Гондурас',
    },
    {
      'ru': 'Гонконг',
      'uz-ln': 'Gongkong',
      'uz-cl': 'Гонгконг',
    },
    {
      'ru': 'Гренада',
      'uz-ln': 'Grenada',
      'uz-cl': 'Гренада',
    },
    {
      'ru': 'Гренландия',
      'uz-ln': 'Grenlandiya',
      'uz-cl': 'Гренландия',
    },
    {
      'ru': 'Греция',
      'uz-ln': 'Gretsiya',
      'uz-cl': 'Греция',
    },
    {
      'ru': 'Грузия',
      'uz-ln': 'Gruziya',
      'uz-cl': 'Грузия',
    },
    {
      'ru': 'Дания',
      'uz-ln': 'Daniya',
      'uz-cl': 'Дания',
    },
    {
      'ru': 'Джерси о-в',
      'uz-ln': 'Jersi oroli',
      'uz-cl': 'Жерси ороли',
    },
    {
      'ru': 'Джибути',
      'uz-ln': 'Djibouti',
      'uz-cl': 'Джибоути',
    },
    {
      'ru': 'Доминиканская республика',
      'uz-ln': 'Dominikan Respublikasi',
      'uz-cl': 'Доминикан Республикаси',
    },
    {
      'ru': 'Египет',
      'uz-ln': 'Misr',
      'uz-cl': 'Миср',
    },
    {
      'ru': 'Замбия',
      'uz-ln': 'Zambiya',
      'uz-cl': 'Замбия',
    },
    {
      'ru': 'Зимбабве',
      'uz-ln': 'Zimbabve',
      'uz-cl': 'Зимбабве',
    },
    {
      'ru': 'Израиль',
      'uz-ln': 'Isroil',
      'uz-cl': 'Исроил',
    },
    {
      'ru': 'Индия',
      'uz-ln': 'Hindiston',
      'uz-cl': 'Ҳиндистон',
    },
    {
      'ru': 'Индонезия',
      'uz-ln': 'Indoneziya',
      'uz-cl': 'Индонезия',
    },
    {
      'ru': 'Иордания',
      'uz-ln': 'Iordaniya',
      'uz-cl': 'Иордания',
    },
    {
      'ru': 'Ирак',
      'uz-ln': 'Iroq',
      'uz-cl': 'Ироқ',
    },
    {
      'ru': 'Иран',
      'uz-ln': 'Eron',
      'uz-cl': 'Эрон',
    },
    {
      'ru': 'Ирландия',
      'uz-ln': 'Irlandiya',
      'uz-cl': 'Ирландия',
    },
    {
      'ru': 'Исландия',
      'uz-ln': 'Islandiya',
      'uz-cl': 'Исландия',
    },
    {
      'ru': 'Испания',
      'uz-ln': 'Ispaniya',
      'uz-cl': 'Испания',
    },
    {
      'ru': 'Италия',
      'uz-ln': 'Italiya',
      'uz-cl': 'Италия',
    },
    {
      'ru': 'Йемен',
      'uz-ln': 'Yaman',
      'uz-cl': 'Яман',
    },
    {
      'ru': 'Кабо-Верде',
      'uz-ln': 'Cape Verde',
      'uz-cl': 'Cапе Верде',
    },
    {
      'ru': 'Казахстан',
      'uz-ln': "Qozog'iston",
      'uz-cl': 'Қозоғистон',
    },
    {
      'ru': 'Камбоджа',
      'uz-ln': 'Kambodja',
      'uz-cl': 'Камбоджа',
    },
    {
      'ru': 'Камерун',
      'uz-ln': 'Kamerun',
      'uz-cl': 'Камерун',
    },
    {
      'ru': 'Канада',
      'uz-ln': 'Kanada',
      'uz-cl': 'Канада',
    },
    {
      'ru': 'Катар',
      'uz-ln': 'Qatar',
      'uz-cl': 'Қатар',
    },
    {
      'ru': 'Кения',
      'uz-ln': 'Keniya',
      'uz-cl': 'Кения',
    },
    {
      'ru': 'Кипр',
      'uz-ln': 'Kipr',
      'uz-cl': 'Кипр',
    },
    {
      'ru': 'Кирибати',
      'uz-ln': 'Kiribati',
      'uz-cl': 'Кирибати',
    },
    {
      'ru': 'Китай',
      'uz-ln': 'Xitoy',
      'uz-cl': 'Хитой',
    },
    {
      'ru': 'Колумбия',
      'uz-ln': 'Kolumbiya',
      'uz-cl': 'Колумбия',
    },
    {
      'ru': 'Коморские о-ва',
      'uz-ln': 'Komorlar',
      'uz-cl': 'Коморлар',
    },
    {
      'ru': 'Конго (Brazzaville)',
      'uz-ln': 'Kongo (Brazzavil)',
      'uz-cl': 'Конго (Браззавил)',
    },
    {
      'ru': 'Конго (Kinshasa)',
      'uz-ln': 'Kongo (Kinshasa)',
      'uz-cl': 'Конго (Киншаса)',
    },
    {
      'ru': 'Коста-Рика',
      'uz-ln': 'Kosta-Rika',
      'uz-cl': 'Коста-Рика',
    },
    {
      'ru': 'Кот-д’Ивуар',
      'uz-ln': "Kot-d’Ivuar",
      'uz-cl': 'Кот-дъИвуар',
    },
    {
      'ru': 'Куба',
      'uz-ln': 'Kuba',
      'uz-cl': 'Куба',
    },
    {
      'ru': 'Кувейт',
      'uz-ln': 'Quvayt',
      'uz-cl': 'Қувайт',
    },
    {
      'ru': 'Кука о-ва',
      'uz-ln': 'Kuk orollari',
      'uz-cl': 'Кук ороллари',
    },
    {
      'ru': 'Кыргызстан',
      'uz-ln': "Qirg'iziston",
      'uz-cl': 'Қирғизистон',
    },
    {
      'ru': 'Лаос',
      'uz-ln': 'Laos',
      'uz-cl': 'Лаос',
    },
    {
      'ru': 'Латвия',
      'uz-ln': 'Latviya',
      'uz-cl': 'Латвия',
    },
    {
      'ru': 'Лесото',
      'uz-ln': 'Lesoto',
      'uz-cl': 'Лесото',
    },
    {
      'ru': 'Либерия',
      'uz-ln': 'Liberiya',
      'uz-cl': 'Либерия',
    },
    {
      'ru': 'Ливан',
      'uz-ln': 'Livan',
      'uz-cl': 'Ливан',
    },
    {
      'ru': 'Ливия',
      'uz-ln': 'Liviya',
      'uz-cl': 'Ливия',
    },
    {
      'ru': 'Литва',
      'uz-ln': 'Litva',
      'uz-cl': 'Литва',
    },
    {
      'ru': 'Лихтенштейн',
      'uz-ln': 'Lixtenshteyn',
      'uz-cl': 'Лихтенштейн',
    },
    {
      'ru': 'Люксембург',
      'uz-ln': 'Lyuksemburg',
      'uz-cl': 'Люксембург',
    },
    {
      'ru': 'Маврикий',
      'uz-ln': 'Mavrikiy',
      'uz-cl': 'Маврикий',
    },
    {
      'ru': 'Мавритания',
      'uz-ln': 'Mavritaniya',
      'uz-cl': 'Мавритания',
    },
    {
      'ru': 'Мадагаскар',
      'uz-ln': 'Madagaskar',
      'uz-cl': 'Мадагаскар',
    },
    {
      'ru': 'Македония',
      'uz-ln': 'Makedoniya',
      'uz-cl': 'Македония',
    },
    {
      'ru': 'Малави',
      'uz-ln': 'Malavi',
      'uz-cl': 'Малави',
    },
    {
      'ru': 'Малайзия',
      'uz-ln': 'Malayziya',
      'uz-cl': 'Малайзия',
    },
    {
      'ru': 'Мали',
      'uz-ln': 'Mali',
      'uz-cl': 'Мали',
    },
    {
      'ru': 'Мальдивские о-ва',
      'uz-ln': 'Maldiv orollari',
      'uz-cl': 'Малдив ороллари',
    },
    {
      'ru': 'Мальта',
      'uz-ln': 'Malta',
      'uz-cl': 'Малта',
    },
    {
      'ru': 'Мартиника о-в',
      'uz-ln': 'Martini oroli',
      'uz-cl': 'Мартини ороли',
    },
    {
      'ru': 'Мексика',
      'uz-ln': 'Meksika',
      'uz-cl': 'Мексика',
    },
    {
      'ru': 'Мозамбик',
      'uz-ln': 'Mozambik',
      'uz-cl': 'Мозамбик',
    },
    {
      'ru': 'Молдова',
      'uz-ln': 'Moldova',
      'uz-cl': 'Молдова',
    },
    {
      'ru': 'Монако',
      'uz-ln': 'Monako',
      'uz-cl': 'Монако',
    },
    {
      'ru': 'Монголия',
      'uz-ln': "Mo'g'uliston",
      'uz-cl': 'Мўғулистон',
    },
    {
      'ru': 'Марокко',
      'uz-ln': 'Marokash',
      'uz-cl': 'Марокаш',
    },
    {
      'ru': 'Мьянма (Бирма)',
      'uz-ln': 'Myanma (Birma)',
      'uz-cl': 'Мянма (Бирма)',
    },
    {
      'ru': 'Мэн о-в',
      'uz-ln': 'Man oroli',
      'uz-cl': 'Ман ороли',
    },
    {
      'ru': 'Намибия',
      'uz-ln': 'Namibiya',
      'uz-cl': 'Намибия',
    },
    {
      'ru': 'Науру',
      'uz-ln': 'Nauru',
      'uz-cl': 'Науру',
    },
    {
      'ru': 'Непал',
      'uz-ln': 'Nepal',
      'uz-cl': 'Непал',
    },
    {
      'ru': 'Нигер',
      'uz-ln': 'Niger',
      'uz-cl': 'Нигер',
    },
    {
      'ru': 'Нигерия',
      'uz-ln': 'Nigeriya',
      'uz-cl': 'Нигерия',
    },
    {
      'ru': 'Нидерланды (Голландия)',
      'uz-ln': 'Gollandiya (Gollandiya)',
      'uz-cl': 'Голландия (Голландия)',
    },
    {
      'ru': 'Никарагуа',
      'uz-ln': 'Nikaragua',
      'uz-cl': 'Никарагуа',
    },
    {
      'ru': 'Новая Зеландия',
      'uz-ln': 'Yangi Zelandiya',
      'uz-cl': 'Янги Зеландия',
    },
    {
      'ru': 'Новая Каледония о-в',
      'uz-ln': 'Yangi Kaledoniya',
      'uz-cl': 'Янги Каледония',
    },
    {
      'ru': 'Норвегия',
      'uz-ln': 'Norvegiya',
      'uz-cl': 'Норвегия',
    },
    {
      'ru': 'Норфолк о-в',
      'uz-ln': 'Norfolk oroli',
      'uz-cl': 'Норфолк ороли',
    },
    {
      'ru': 'О.А.Э.',
      'uz-ln': 'Birlashgan Arab Amirliklari',
      'uz-cl': 'Бирлашган Араб Амирликлари',
    },
    {
      'ru': 'Оман',
      'uz-ln': 'Ummon',
      'uz-cl': 'Уммон',
    },
    {
      'ru': 'Пакистан',
      'uz-ln': 'Pokiston',
      'uz-cl': 'Покистон',
    },
    {
      'ru': 'Панама',
      'uz-ln': 'Panama',
      'uz-cl': 'Панама',
    },
    {
      'ru': 'Папуа Новая Гвинея',
      'uz-ln': 'Papua-Yangi Gvineya',
      'uz-cl': 'Папуа-Янги Гвинея',
    },
    {
      'ru': 'Парагвай',
      'uz-ln': 'Paragvay',
      'uz-cl': 'Парагвай',
    },
    {
      'ru': 'Перу',
      'uz-ln': 'Peru',
      'uz-cl': 'Перу',
    },
    {
      'ru': 'Питкэрн о-в',
      'uz-ln': 'Pitkern oroli',
      'uz-cl': 'Питкерн ороли',
    },
    {
      'ru': 'Польша',
      'uz-ln': 'Polsha',
      'uz-cl': 'Полша',
    },
    {
      'ru': 'Португалия',
      'uz-ln': 'Portugaliya',
      'uz-cl': 'Португалия',
    },
    {
      'ru': 'Пуэрто Рико',
      'uz-ln': 'Puerto-Riko',
      'uz-cl': 'Пуерто-Рико',
    },
    {
      'ru': 'Реюньон',
      'uz-ln': 'Reunion',
      'uz-cl': 'Реунион',
    },
    {
      'ru': 'Руанда',
      'uz-ln': 'Ruandada',
      'uz-cl': 'Руандада',
    },
    {
      'ru': 'Румыния',
      'uz-ln': 'Ruminiya',
      'uz-cl': 'Руминия',
    },
    {
      'ru': 'США',
      'uz-ln': "Amerika Qo'shma Shtatlari",
      'uz-cl': 'Америка Қўшма Чтатлари',
    },
    {
      'ru': 'Сальвадор',
      'uz-ln': 'El-salvador',
      'uz-cl': 'Эл-салвадор',
    },
    {
      'ru': 'Самоа',
      'uz-ln': 'Samoa',
      'uz-cl': 'Самоа',
    },
    {
      'ru': 'Сан-Марино',
      'uz-ln': 'San-Marino',
      'uz-cl': 'Сан-Марино',
    },
    {
      'ru': 'Сан-Томе и Принсипи',
      'uz-ln': 'San-Tome va Principe',
      'uz-cl': 'Сан-Томе ва Принcипе',
    },
    {
      'ru': 'Саудовская Аравия',
      'uz-ln': 'Saudiya Arabistoni',
      'uz-cl': 'Саудия Арабистони',
    },
    {
      'ru': 'Свазиленд',
      'uz-ln': 'Svazilend',
      'uz-cl': 'Свазиленд',
    },
    {
      'ru': 'Святая Люсия',
      'uz-ln': 'Saint Lucia',
      'uz-cl': 'Саинт Луcиа',
    },
    {
      'ru': 'Святой Елены о-в',
      'uz-ln': 'Muqaddas Elena',
      'uz-cl': 'Муқаддас Элена',
    },
    {
      'ru': 'Северная Корея',
      'uz-ln': 'shimoliy Koreya',
      'uz-cl': 'шимолий Корея',
    },
    {
      'ru': 'Сейшеллы',
      'uz-ln': 'Seychelles',
      'uz-cl': 'Сейчеллес',
    },
    {
      'ru': 'Сен-Пьер и Микелон',
      'uz-ln': 'Aziz Per va Miquelon',
      'uz-cl': 'Азиз Пер ва Миқуелон',
    },
    {
      'ru': 'Сенегал',
      'uz-ln': 'Senegal',
      'uz-cl': 'Сенегал',
    },
    {
      'ru': 'Сент Китс и Невис',
      'uz-ln': 'Sent-Kits va Nevis',
      'uz-cl': 'Сент-Киц ва Невис',
    },
    {
      'ru': 'Сент-Винсент и Гренадины',
      'uz-ln': 'Sent-Vinsent va Grenadinler',
      'uz-cl': 'Сент-Винсент ва Гренадинлер',
    },
    {
      'ru': 'Сербия',
      'uz-ln': 'Serbiya',
      'uz-cl': 'Сербия',
    },
    {
      'ru': 'Сингапур',
      'uz-ln': 'Singapur',
      'uz-cl': 'Сингапур',
    },
    {
      'ru': 'Сирия',
      'uz-ln': 'Suriya',
      'uz-cl': 'Сурия',
    },
    {
      'ru': 'Словакия',
      'uz-ln': 'Slovakiya',
      'uz-cl': 'Словакия',
    },
    {
      'ru': 'Словения',
      'uz-ln': 'Sloveniya',
      'uz-cl': 'Словения',
    },
    {
      'ru': 'Соломоновы о-ва',
      'uz-ln': 'Solomon orollari',
      'uz-cl': 'Соломон ороллари',
    },
    {
      'ru': 'Сомали',
      'uz-ln': 'Somali',
      'uz-cl': 'Сомали',
    },
    {
      'ru': 'Судан',
      'uz-ln': 'Sudan',
      'uz-cl': 'Судан',
    },
    {
      'ru': 'Суринам',
      'uz-ln': 'Surinam',
      'uz-cl': 'Суринам',
    },
    {
      'ru': 'Сьерра-Леоне',
      'uz-ln': 'Sierra Leon',
      'uz-cl': 'Сиерра Леон',
    },
    {
      'ru': 'Таджикистан',
      'uz-ln': 'Tojikiston',
      'uz-cl': 'Тожикистон',
    },
    {
      'ru': 'Тайвань',
      'uz-ln': 'Tayvan',
      'uz-cl': 'Тайван',
    },
    {
      'ru': 'Таиланд',
      'uz-ln': 'Tailand',
      'uz-cl': 'Таиланд',
    },
    {
      'ru': 'Танзания',
      'uz-ln': 'Tanzaniya',
      'uz-cl': 'Танзания',
    },
    {
      'ru': 'Того',
      'uz-ln': 'Buning',
      'uz-cl': 'Бунинг',
    },
    {
      'ru': 'Токелау о-ва',
      'uz-ln': 'Tokelau orollari',
      'uz-cl': 'Токелау ороллари',
    },
    {
      'ru': 'Тонга',
      'uz-ln': 'Tonga',
      'uz-cl': 'Тонга',
    },
    {
      'ru': 'Тринидад и Тобаго',
      'uz-ln': 'Trinidad va Tobago',
      'uz-cl': 'Тринидад ва Тобаго',
    },
    {
      'ru': 'Тувалу',
      'uz-ln': 'Tuvalu',
      'uz-cl': 'Тувалу',
    },
    {
      'ru': 'Тунис',
      'uz-ln': 'Tunis',
      'uz-cl': 'Тунис',
    },
    {
      'ru': 'Туркменистан',
      'uz-ln': 'Turkmaniston',
      'uz-cl': 'Туркманистон',
    },
    {
      'ru': 'Туркс и Кейкос',
      'uz-ln': 'Turklar va keikos',
      'uz-cl': 'Турклар ва кеикос',
    },
    {
      'ru': 'Турция',
      'uz-ln': 'Turkiya',
      'uz-cl': 'Туркия',
    },
    {
      'ru': 'Уганда',
      'uz-ln': 'Uganda',
      'uz-cl': 'Уганда',
    },
    {
      'ru': 'Узбекистан',
      'uz-ln': "O'zbekiston",
      'uz-cl': 'Ўзбекистон',
    },
    {
      'ru': 'Уругвай',
      'uz-ln': 'Urugvay',
      'uz-cl': 'Уругвай',
    },
    {
      'ru': 'Фарерские о-ва',
      'uz-ln': 'Farer orollari',
      'uz-cl': 'Фарер ороллари',
    },
    {
      'ru': 'Фиджи',
      'uz-ln': 'Fidji',
      'uz-cl': 'Фиджи',
    },
    {
      'ru': 'Филиппины',
      'uz-ln': 'Filippin',
      'uz-cl': 'Филиппин',
    },
    {
      'ru': 'Финляндия',
      'uz-ln': 'Finlandiya',
      'uz-cl': 'Финландия',
    },
    {
      'ru': 'Франция',
      'uz-ln': 'Frantsiya',
      'uz-cl': 'Франция',
    },
    {
      'ru': 'Французская Гвинея',
      'uz-ln': 'Frantsiya gvineya',
      'uz-cl': 'Франция гвинея',
    },
    {
      'ru': 'Французская Полинезия',
      'uz-ln': 'Frantsiya Polineziyasi',
      'uz-cl': 'Франция Полинезияси',
    },
    {
      'ru': 'Хорватия',
      'uz-ln': 'Xorvatiya',
      'uz-cl': 'Хорватия',
    },
    {
      'ru': 'Чад',
      'uz-ln': 'Chad',
      'uz-cl': 'Чад',
    },
    {
      'ru': 'Черногория',
      'uz-ln': 'Chernogoriya',
      'uz-cl': 'Черногория',
    },
    {
      'ru': 'Чехия',
      'uz-ln': 'Chexiya',
      'uz-cl': 'Чехия',
    },
    {
      'ru': 'Чили',
      'uz-ln': 'Chili',
      'uz-cl': 'Чили',
    },
    {
      'ru': 'Швейцария',
      'uz-ln': 'Shveytsariya',
      'uz-cl': 'Чвейцария',
    },
    {
      'ru': 'Швеция',
      'uz-ln': 'Shvetsiya',
      'uz-cl': 'Чвеция',
    },
    {
      'ru': 'Шри-Ланка',
      'uz-ln': 'Shri Lanka',
      'uz-cl': 'Чри Ланка',
    },
    {
      'ru': 'Эквадор',
      'uz-ln': 'Ekvador',
      'uz-cl': 'Эквадор',
    },
    {
      'ru': 'Экваториальная Гвинея',
      'uz-ln': 'Ekvatorial Gvineya',
      'uz-cl': 'Экваториал Гвинея',
    },
    {
      'ru': 'Эритрея',
      'uz-ln': 'Eritreya',
      'uz-cl': 'Эритрея',
    },
    {
      'ru': 'Эстония',
      'uz-ln': 'Estoniya',
      'uz-cl': 'Эстония',
    },
    {
      'ru': 'Эфиопия',
      'uz-ln': 'Efiopiya',
      'uz-cl': 'Эфиопия',
    },
    {
      'ru': 'ЮАР',
      'uz-ln': 'Janubiy Afrika',
      'uz-cl': 'Жанубий Африка',
    },
    {
      'ru': 'Южная Корея',
      'uz-ln': 'Janubiy Koreya',
      'uz-cl': 'Жанубий Корея',
    },
    {
      'ru': 'Южная Осетия',
      'uz-ln': 'Janubiy Osetiya',
      'uz-cl': 'Жанубий Осетия',
    },
    {
      'ru': 'Ямайка',
      'uz-ln': 'Yamayka',
      'uz-cl': 'Ямайка',
    },
    {
      'ru': 'Япония',
      'uz-ln': 'Yaponiya',
      'uz-cl': 'Япония',
    },
];