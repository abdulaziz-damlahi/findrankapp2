
2
3
4
5
6
7
8
9
10
11
12
13
14
15
16
17
18
19
20
21
22
23
24
25
26
27
28
29
30
31
32
33
34
35
36
37
38
39
40
41
42
43
44
45
46
47
48
49
50
51
52
53
54
55
56
57
58
59
60
61
62
63
64
65
66
67
68
69
70
71
72
73
74
75
76
77
78
79
80
81
82
83
84
85
86
87
88
89
90
91
92
93
94
95
96
97
98
99
100
101
102
103
104
105
106
107
108
109
110
111
112
113
114
115
116
117
118
119
120
121
122
123
124
125
126
127
128
129
130
131
132
133
134
135
136
137
138
139
140
141
142
143
144
145
146
147
148
149
150
151
152
153
154
155
156
157
158
159
160
161
162
163
164
165
166
167
168
169
170
171
172
173
174
175
176
177
178
179
180
181
182
183
184
185
186
187
188
189
190
191
192
193
194
195
196
197
198
199
200
201
202
203
204
205
206
207
208
209
210
211
212
213
214
215
216
217
218
219
220
$(document).ready(function() {
    $('#Bireyselfrom').hide();
    $('#form2').hide();
    $('#form3').hide();
    $('#form4').hide();
    $('.kurumsal').hide();
    $('#settingsForm').hide();
    $('#settingsForm').height( 500 )
    $( "#kurumsal" ).on( "click", function() {
        $('#Bireyselfrom').hide();
        $('#Kurumsalform').show();
        $('.kurumsal').show();
        $('#settingsForm').height(700 )
        $('#themostunder').css('margin-right','60%');
    });
    $( ".PURCHACE" ).on( "click", function() {
        $('#settingsForm').show();
    });
    $( "#bireysel" ).on( "click", function() {
        $('#Bireyselfrom').show();
        $('#Kurumsalform ').hide();
        $('#settingsForm').height( 500 )
    });
    i=0;
    $( "#button_contact2" ).click(function() {
        $('.kurumsal').hide();
        i;
        if(i<3) {
            $('.menuy ul li').eq(i).removeClass('active');
            $('.menuy ul li').eq(i + 1).addClass('active');
            i++;
            if(i===0){
                if($( '#kurumsal' ).prop( "checked" )==='false'){
                    $('.kurumsal').hide();
                    console.log($('.kurumsal').text());
                }
                $('#form1').show();
                $('#form2').hide();
                $('#form3').hide();
                $('#form4').hide();
            }
            else if(i===1){
                $('#form1').hide();
                $('#form2').show();
                $('#form3').hide();
                $('#form4').hide();
                $('#form2').height(300);
            }else if(i===2){
                $('#form1').hide();
                $('#form2').hide();
                $('#form3').show();
                $('#form4').hide();
            }else if(i===3){
                $('#form1').hide();
                $('#form2').hide();
                $('#form3').hide();
                $('#form4').show();
                $('#button_contact').hide();
                $('#button_contact2').hide();
            }
        }
    });
    $( "#button_contact" ).click(function() {
        $('#themostunder').css('margin-right','0%');
        $('.kurumsal').hide();
        i;
        if(i<4 && i>0) {
            $('.menuy ul li').eq(i).removeClass('active');
            $('.menuy ul li').eq(i - 1).addClass('active');
            i--;
            if(i===0){
                if($( '#kurumsal' ).prop( "checked" )==='false'){
                    $('.kurumsal').hide();
                    console.log($('.kurumsal').text());
                }
                $('#form1').show();
                $('#form2').hide();
                $('#form3').hide();
                $('#form4').hide();
            }
            else if(i===1){
                $('#form1').hide();
                $('#form2').show();
                $('#form3').hide();
                $('#form4').hide();
                $('#form2').height(300);
            }else if(i===2){
                $('#form1').hide();
                $('#form2').hide();
                $('#form3').show();
                $('#form4').hide();
            }else if(i===3){
                $('#form1').hide();
                $('#form2').hide();
                $('#form3').hide();
                $('#form4').show();
                $('#button_contact').hide();
                $('#button_contact2').hide();
            }
        }
    });
    $('.setting_button').css('margin-right','0px');
    $('.personal_settings').hide();
    $('.custumize').hide();
    $(".setting_but").click(function() {
        $('.setting_button').not(self).removeClass('active');
        $(this).parent().addClass('active');
        $(this).addClass("active");
        if($('#button_first').hasClass('active')){
            $('.personal_settings').hide();
            $('.password_process').show();
            $('.custumize').hide();
        }
        else if($('#button_second').hasClass('active')){
            $('.personal_settings').show();
            $('.custumize').hide();
            $('.password_process').hide();
        } else if($('#button_third').hasClass('active')){
            $('.personal_settings').hide();
            $('.password_process').hide();
            $('.custumize').show();
        }
    });
    function packets_reels () {
        $.ajax({
            type: 'get',
            url: "http://127.0.0.1:8000/api/v1/packets-reels",
            success: function (response) {
                jQuery.each(response, function (i, val) {
                    jQuery.each(val, function (is, vall) {
                        $start = vall.id - 1;
                        $(".PURCHACE").eq($start).val(vall.id);
                        console.log($(".PURCHACE").val());
                    });
                });
            }
        });
    }
    packets_reels();
    $(".PURCHACE").click(function() {
        let number_id = $(this).val();
        get_one_packets(number_id);
        $("#packets_show").hide();
        $("#settingsForm").show();
    });
    function get_one_packets(id){
        $.ajax({
            type: 'get',
            url: "http://127.0.0.1:8000/api/v1/packets-reels/"+id,
            success: function (response) {
                $(".price_packet").text(response.data.attributes.price+ " TL");
                $("#total_price").text("Toplam : "+response.data.attributes.price+ " TL");
                jQuery.each(response, function (i, val) {
                    jQuery.each(val, function (is, vall) {
                        console.log(vall);
                        $(".hidden_word_count").val(vall.count_of_words)
                        $(".hidden_websites_count").val(vall.websites_count)
                        $(".başlangic").text(vall.names_packets);
                        $(".hidden_description").val(vall.description)
                    });
                });
            }
        });
    }
    $( "#button_pay" ).click(function() {
        post_invoice();
    });
    function post_invoice(){
        $.ajax({
            url: "http://127.0.0.1:8000/api/v1/invoicerecords",
            type: "POST",
            headers: { "Content-Type": "application/vnd.api+json",
                Accept: "application/vnd.api+json",
            },
            data: JSON.stringify({
                "data": {
                    "type": "invoicerecords",
                    "attributes": {
                        "first_name":"first_name",
                        "last_name":"last_name",
                        "Id_number":"2201546589",
                        "tax_no":"sa",
                        "tax_address":"sa",
                        "country":"sa",
                        "city":"sa",
                        "company_name":"sa"
                    }
                }
            }),
            success: function (result) {
                console.log('işlem başarılı')
            }
        });
    }
});
// payment
