;(function (global, factory) {
    typeof exports === 'object' && typeof module !== 'undefined'
    && typeof require === 'function' ? factory(require('../moment')) :
        typeof define === 'function' && define.amd ? define(['../moment'], factory) :
            factory(global.moment)
}(this, (function (moment) { 'use strict';

    var suffixes = {
        1: '\'inji',
        2: '\'nji',
        3: '\'ünji',
        4: '\'ünji',
        5: '\'inji',
        6: '\'njy',
        7: '\'nji',
        8: '\'inji',
        9: '\'ynjy',
        10: '\'ynjy',
        20: '\'njy',
        30: '\'ynjy',
        40: '\'ynjy',
        50: '\'inji',
        60: '\'ynjy',
        70: '\'inji',
        80: '\'inji',
        90: '\'ynjy',
        100: '\'ünji',
    };

    var tr = moment.defineLocale('tr', {
        months : 'Ýanwar_Fewral_Mart_Aprel_Maý_Iýun_Iýul_Awgust_Sentýabr_Oktýabr_Noýabr_Dekabr'.split('_'),
        monthsShort : 'Ýan_Few_Apr_Nis_Maý_Iýun_Iýul_Awg_Sen_Okt_Noý_Dek'.split('_'),
        weekdays : 'Ýekşenbe_Duşenbe_Sişenbe_Çarşenbe_Penşenbe_Anna_Şenbe'.split('_'),
        weekdaysShort : 'Ýek_Duş_Siş_Çar_Pen_Ann_Şen'.split('_'),
        weekdaysMin : 'Ýe_Du_Si_Ça_Pe_An_Şe'.split('_'),
        longDateFormat : {
            LT : 'HH:mm',
            LTS : 'HH:mm:ss',
            L : 'DD.MM.YYYY',
            LL : 'D MMMM YYYY',
            LLL : 'D MMMM YYYY HH:mm',
            LLLL : 'dddd, D MMMM YYYY HH:mm'
        },
        calendar : {
            sameDay : '[bugün saat] LT',
            nextDay : '[yarın saat] LT',
            nextWeek : '[gelecek] dddd [saat] LT',
            lastDay : '[dün] LT',
            lastWeek : '[geçen] dddd [saat] LT',
            sameElse : 'L'
        },
        relativeTime : {
            future : '%s soňra',
            past : '%s öň',
            s : 'birnäçe sekunt',
            ss : '%d sekunt',
            m : 'bir minut',
            mm : '%d minut',
            h : 'bir sagat',
            hh : '%d sagat',
            d : 'bir gün',
            dd : '%d gün',
            M : 'bir aý',
            MM : '%d aý',
            y : 'bir ýyl',
            yy : '%d ýyl'
        },
        ordinal: function (number, period) {
            switch (period) {
                case 'd':
                case 'D':
                case 'Do':
                case 'DD':
                    return number;
                default:
                    if (number === 0) {  // special case for zero
                        return number + '\'ıncı';
                    }
                    var a = number % 10,
                        b = number % 100 - a,
                        c = number >= 100 ? 100 : null;
                    return number + (suffixes[a] || suffixes[b] || suffixes[c]);
            }
        },
        week : {
            dow : 1, // Monday is the first day of the week.
            doy : 7  // The week that contains Jan 7th is the first week of the year.
        }
    });

    return tr;

})));