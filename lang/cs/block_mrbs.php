<?php

// -*-mode: PHP; coding:utf-8;-*-
// $Id: block_mrbs_rlp.php,v 1.1 2009/02/26 07:20:12 arborrow Exp $
// This file contains PHP code that specifies language specific strings
// The default strings come from lang.en, and anything in a locale
// specific file will overwrite the default. This is a Czech file.
//
// Translations provided by: "SmEjDiL" <malyl@col.cz>,
//   "David Krotil" <David.Krotil@mu-sokolov.cz>
//
// This file is PHP code. Treat it as such.
// The charset to use in "Content-type" header
$string["charset"] = "utf-8";

// Used for Moodle
$string['blockname'] = 'Rezerva�?ní systém';
$string['accessmrbs_rlp'] = 'Objednáno ressources';

// Used in style.inc
$string["mrbs_rlp"] = "MRBS - Rezerva�?ní systém";

// Used in functions.inc
$string["report"] = "Výpis";
$string["admin"] = "Administrátor";
$string["help"] = "Pomoc";
$string["search"] = "Hledat";
$string["not_php3"] = "UPOZORNĚN�?: Toto zřejmě není funk�?ní s PHP3";

// Used in day.php
$string["bookingsfor"] = "Objednáno pro";
$string["bookingsforpost"] = ""; // Goes after the date
$string["areas"] = "Oblasti";
$string["daybefore"] = "Den vzad";
$string["dayafter"] = "Den vpřed";
$string["gototoday"] = "Dnes";
$string["goto"] = "Přejít na";
$string["highlight_line"] = "Ozna�?te tuto řádku";
$string["click_to_reserve"] = "Klepněte na buňku, aby jste provedli rezervaci.";

// Used in trailer.inc
$string["viewday"] = "Dny";
$string["viewweek"] = "Týdny";
$string["viewmonth"] = "Měsíce ";
$string["ppreview"] = "Pro tisk";

// Used in edit_entry.php
$string["addentry"] = "Přidat záznam";
$string["editentry"] = "Editovat záznam";
$string["editseries"] = "Editovat sérii";
$string["namebooker"] = "Popis instrukce";
$string["fulldescription"] = "Celkový popis:<br>&nbsp;&nbsp;(Po�?et cestujících,<br>&nbsp;&nbsp;Obsazeno/Volná místa atd)";
$string["date"] = "Datum";
$string["start_date"] = "Za�?átek";
$string["end_date"] = "Konec";
$string["time"] = "Čas";
$string["period"] = "Perioda";
$string["duration"] = "Doba trvání";
$string["seconds"] = "sekundy";
$string["minutes"] = "minuty";
$string["hours"] = "hodiny";
$string["days"] = "dny";
$string["weeks"] = "víkendy";
$string["years"] = "roky";
$string["periods"] = "period";
$string["all_day"] = "Vechny dny";
$string["type"] = "Typ";
$string["internal"] = "Volná místa";
$string["external"] = "Obsazeno";
$string["save"] = "Uloit";
$string["rep_type"] = "Typ opakování";
$string["rep_type_0"] = "Nikdy";
$string["rep_type_1"] = "Denně";
$string["rep_type_2"] = "Týdně";
$string["rep_type_3"] = "Měsí�?ně";
$string["rep_type_4"] = "Ro�?ně";
$string["rep_type_5"] = "Měsí�?ně, jednou za měsíc";
$string["rep_type_6"] = "n-týdnů";
$string["rep_end_date"] = "Konec opakování";
$string["rep_rep_day"] = "Opakovat v den";
$string["rep_for_weekly"] = "(pro (n-)týdnů)";
$string["rep_freq"] = "Frekvence";
$string["rep_num_weeks"] = "Čislo týdne";
$string["rep_for_nweekly"] = "(pro n-týdnů)";
$string["ctrl_click"] = "Uít CTRL pro výběr více místností";
$string["entryid"] = "Vstupní ID ";
$string["repeat_id"] = "ID pro opakování";
$string["you_have_not_entered"] = "Nevloil jste";
$string["you_have_not_selected"] = "Nevybral jste";
$string["valid_room"] = "prostředek.";
$string["valid_time_of_day"] = "platný �?asový úsek dne.";
$string["brief_description"] = "Krátký popis.";
$string["useful_n-weekly_value"] = "pouitelná x-týdenní hodnota.";

// Used in view_entry.php
$string["description"] = "Popis";
$string["room"] = "Místnost";
$string["createdby"] = "Vytvořil uivatel";
$string["lastupdate"] = "Poslední změna";
$string["deleteentry"] = "Smazat záznam";
$string["deleteseries"] = "Smazat sérii";
$string["confirmdel"] = "Jste si jistý smazáním tohoto záznamu?";
$string["returnprev"] = "Návrat na předchozí stránku";
$string["invalid_entry_id"] = "patné ID záznamu.";
$string["invalid_series_id"] = "patné ID skupiny.";

// Used in edit_entry_handler.php
$string["error"] = "Chyba";
$string["sched_conflict"] = "Konflikt při plánování";
$string["conflict"] = "Nová rezervace je v konfliktu s jiným záznamem";
$string["too_may_entrys"] = "Vybraná volba byla vytvořena pro jiné záznamy.<br>Prosím vyberte jinou volbu!";
$string["returncal"] = "Návrat do kalendáře";
$string["failed_to_acquire"] = "Chyba výhradního přístupu do databáze";

// Authentication stuff
$string["accessdenied"] = "Přístup zamítnut";
$string["norights"] = "Nemáte přístupové právo pro změnu této poloky.";
$string["please_login"] = "Prosím, přihlate se";
$string["user_name"] = "Jméno";
$string["user_password"] = "Heslo";
$string["unknown_user"] = "Neznámý uivatel";
$string["you_are"] = "Jste";
$string["login"] = "Přihlásit se";
$string["logoff"] = "Odhlásit se";

// Authentication database
$string["user_list"] = "Seznam uivatelů";
$string["edit_user"] = "Editovat uivatele";
$string["delete_user"] = "Smazat tohoto uivatele";
//$string["user_name"]         = Use the same as above, for consistency.
//$string["user_password"]     = Use the same as above, for consistency.
$string["user_email"] = "Emailová adresa";
$string["password_twice"] = "Pokud chcete změnit heslo, prosím napite ho dvakrát";
$string["passwords_not_eq"] = "Chyba: Vloená hesla se neshodují.";
$string["add_new_user"] = "Přidat nového uivatele";
$string["rights"] = "Práva";
$string["action"] = "Akce";
$string["user"] = "Uivatel";
$string["administrator"] = "Administrátor";
$string["unknown"] = "Neznámý";
$string["ok"] = "Ano";
$string["show_my_entries"] = "Klepnout pro zobrazání vech nadcházejících záznamů";

// Used in search.php
$string["invalid_search"] = "Prázdný nebo neplatný hledaný řetězec.";
$string["search_results"] = "Výsledek hledání pro";
$string["nothing_found"] = "Nic nenalezeno";
$string["records"] = "Záznam";
$string["through"] = " skrze ";
$string["of"] = " o ";
$string["previous"] = "Předchozi";
$string["next"] = "Dalí";
$string["entry"] = "Záznam";
$string["view"] = "Náhled";
$string["advanced_search"] = "Rozířené hledání";
$string["search_button"] = "Hledat";
$string["search_for"] = "Hledat co";
$string["from"] = "Od";

// Used in report.php
$string["report_on"] = "Výpis setkání";
$string["report_start"] = "Výpis za�?átků";
$string["report_end"] = "Výpis konců";
$string["match_area"] = "Hledaná oblast";
$string["match_room"] = "Hledaná místnost";
$string["match_type"] = "Hledaný typ";
$string["ctrl_click_type"] = "Uít CTRL pro výběr více typů";
$string["match_entry"] = "Hledat v popisu";
$string["match_descr"] = "Hledat v celém popisu";
$string["include"] = "Zahrnovat";
$string["report_only"] = "Jen výpis";
$string["summary_only"] = "Jen přehled";
$string["report_and_summary"] = "Výpis a přehled";
$string["summarize_by"] = "Přehled od";
$string["sum_by_descrip"] = "Popis instrukce";
$string["sum_by_creator"] = "Tvůrce";
$string["entry_found"] = "nalezeno";
$string["entries_found"] = "nalezeno";
$string["summary_header"] = "Přehled  (záznamu) hodiny";
$string["summary_header_per"] = "Přehled  (záznamu) periody";
$string["total"] = "Celkem";
$string["submitquery"] = "Vytvořit sestavu";
$string["sort_rep"] = "Seřadit výpis podle";
$string["sort_rep_time"] = "Výchozí den/�?as";
$string["rep_dsp"] = "Zobrazit ve výpisu";
$string["rep_dsp_dur"] = "Trvání";
$string["rep_dsp_end"] = "Čas ukon�?ení";

// Used in week.php
$string["weekbefore"] = "Týden dozadu";
$string["weekafter"] = "Týden dopředu";
$string["gotothisweek"] = "Tento týden";

// Used in month.php
$string["monthbefore"] = "Měsíc dozadu";
$string["monthafter"] = "Měsic dopředu";
$string["gotothismonth"] = "Tento měsíc";

// Used in {day week month}.php
$string["no_rooms_for_area"] = "Pro tuto místnost není definována adná oblast!";

// Used in admin.php
$string["edit"] = "Editovat";
$string["delete"] = "Smazat";
$string["rooms"] = "Místnosti";
$string["in"] = "v";
$string["noareas"] = "ádné oblasti";
$string["addarea"] = "Přidat oblast";
$string["name"] = "Jméno";
$string["noarea"] = "Není vybrána ádná oblast";
$string["browserlang"] = "Prohlíec je nastaven k pouití";
$string["addroom"] = "Přidat místnost";
$string["capacity"] = "Kapacita";
$string["norooms"] = "ádná místnost.";
$string["administration"] = "Administrace";

// Used in edit_area_room.php
$string["editarea"] = "Editovat oblast";
$string["change"] = "Změna";
$string["backadmin"] = "Návrat do administrace";
$string["editroomarea"] = "Editovat popis oblasti nebo místnosti";
$string["editroom"] = "Editovat místnosti";
$string["update_room_failed"] = "Chyba editace místnosti: ";
$string["error_room"] = "Chyba: místnost ";
$string["not_found"] = " nenalezen";
$string["update_area_failed"] = "Chyba editace oblasti: ";
$string["error_area"] = "Chyba: oblast ";
$string["room_admin_email"] = "Email administrátora místnosti";
$string["area_admin_email"] = "Email administrátora oblasti";
$string["invalid_email"] = "patný email!";

// Used in del.php
$string["deletefollowing"] = "Bylo smazáno rezervování";
$string["sure"] = "Jste si jistý?";
$string["YES"] = "ANO";
$string["NO"] = "NE";
$string["delarea"] = "Musíte smazat vechny místnosti v této oblasti předtím ne ji můete smazat<p>";

// Used in help.php
$string["about_mrbs_rlp"] = "O MRBS";
$string["database"] = "Databáze";
$string["system"] = "Systém";
$string["please_contact"] = "Prosím kontaktujte ";
$string["for_any_questions"] = "pokud máte nějaké dalí otázky.";

// Used in mysql.inc AND pgsql.inc
$string["failed_connect_db"] = "Fatalní chyba: Nepodařilo se připojit do databáze";
