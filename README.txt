/******* ***** ************** ************ ************ *********** *****
FreeBSD Ports Index
index the ports on your system and build an index for the 
World Wide Web. 
Waitman Gobble June 7 2013
********** **** ** ******** ******** *** ********** ** * ****** ***/

Note: the code presumes your ports are in /usr/ports

To Use:
1) update layout.html and style.css.
2) update your ports. 
4) run 'parsed.php' in work/
5) run 'rip.php' in work/

The first time you run 'rip.php' it will take a LONG time, because it is 
caching the results of portlint. However, after the first run it will run
much faster. If you don't care about portlint results you can comment that
part out of rip.php, the scripts that display the file will silently 
ignore it and display nothing about portlint.

Installed Ports and Extra Data

ports: devel/subversion is used to update your ports tree. This program uses 
the svnversion program from that port.

If you want to use the pr feature, install ports-mgmt/prhistory from ports, 
and download the ports-related GNATS database files from FreeBSD. These files 
are presently 1.5G. If you would like to have the files sent to you on DVD or 
thumbdrive, drop me a line. The software is hard-coded to use the SQLite3
database from prhistory, which is located in /var/db/ports-pr.db, and the 
GNATS files located in /b/ports. Update the code to match your system
accordingly.

If you want to use the portlint checker feature, install ports-mgmt/portlint. 

-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
COPYING INFORMATION

Copyright 2013 by Waitman Gobble <waitman@waitman.net>

Redistribution and use in source and binary forms, with or without
modification, are permitted provided that the following conditions are met: 

1. Redistributions of source code must retain the above copyright notice, this
   list of conditions and the following disclaimer. 
2. Redistributions in binary form must reproduce the above copyright notice,
   this list of conditions and the following disclaimer in the documentation
   and/or other materials provided with the distribution. 

THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND
ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED
WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE
DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT OWNER OR CONTRIBUTORS BE LIABLE FOR
ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES
(INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES;
LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND
ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT
(INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS
SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.

The views and conclusions contained in the software and documentation are those
of the authors and should not be interpreted as representing official policies, 
either expressed or implied, of the FreeBSD Project.


-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
jQuery License

Copyright 2013 jQuery Foundation and other contributors
http://jquery.com/

Permission is hereby granted, free of charge, to any person obtaining
a copy of this software and associated documentation files (the
"Software"), to deal in the Software without restriction, including
without limitation the rights to use, copy, modify, merge, publish,
distribute, sublicense, and/or sell copies of the Software, and to
permit persons to whom the Software is furnished to do so, subject to
the following conditions:

The above copyright notice and this permission notice shall be
included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND,
EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF
MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND
NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE
LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION
OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION
WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.

:::::......  :::::::::::: :::::::::::   .:.   .:: * Urusei        ::.  
`""""":::::  :::::::::::: ::   *   ::   ::: .:::'    Yatsura *     ::.
 ......          ..:::::: ::.......:: :::::::::..    ......      .: ::.
:::::::::.   ..:::::::"'  """":::"""" ::::::::::::. :::::::::.   ::: ::.
"""'   `::: :::::::'        :.:::.....  :::     `:: """'   `:::  :::  ......
         ::: ::::::::::.   :::::::::::  :::      :::         ::: :::.;:::::::.
         :::  ... ``::::. ::  :::       :::     .:::         ::: ::::::"""":::
      ..:::'.::::::  :::: " :::::::::   :::    .:::        ..::' `:::'     :::
 ...::::::".::'"`::: ::::  """:::""""   :::   .::'   ....:::::"   ..      .;:'
::::::"'   `:::...::.:::' ....:::.....  ::: .:::'   ::::::"'     ':::....;::'
`"""        `:::::::::'   ::::::::::::  ::: ::'     `""           '":::::::'
                                               --- Thomas E. Cardwell II
"Those Obnoxious Aliens"

                                                              ..---..._
                                                        ..--""         "-.
                                                   ..-"""                 ".
                                               ..-""                        "
                                            .-"
                                         .-"      ... -_
                                     .="   _..-" F   .-"-.....___-..
                                     "L_ _-'    ."  j"  .-":   /"-._ "-
                                        "      :  ."  j"  :   :    |"" ".
                                  ......---------"""""""""""-:_     |   |\
                        ...---""""                             -.   f   | "
                ...---""       . ..----""""""""..                ".-... f  ".
         ..---"""       ..---""""""""-..--"""""""""^^::            |. "-.    .
     .--"           .mm::::::::::::::::::::::::::...  ""L           |x   ".
   -"             mm;;;;;;;;;;XXXXXXXXXXXXX:::::::::::.. |           |x.   -
 xF        -._ .mF;;;;;;XXXXXXXXXXXXXXXXXXXXXXXXXX:::::::|            |X:.  "
j         |   j;;;;;XXX#############################::::::|            XX::::
|          |.#;::XXX##################################::::|            |XX:::
|          j#::XXX#######################################::             XXX::
|         .#:XXX###########################################             |XX::
|         #XXX##############################XX############Fl             XXX:
|        .XXX###################XX#######X##XXX###########Fl             lXX:
 |       #XX##################XXX######XXXXXXX###########F j             lXXX
 |       #X#########X#X#####XXX#######XXXXXX#######XXX##F  jl            XXXX
 |       #X#######XX#"  V###XX#' ####XXXXXX##F"T##XXXXXX.  V   /  .    .#XXXX
  |       #########"     V#XX#'  "####XXXX##.---.##XXXXXX.    /  /  / .##XXXX
  |       "######X' .--"" "V##L   #####XXX#"      "###XXXX. ."  /  / .###XXXX
  |         #####X "   .m###m##L   ####XX#      m###m"###XX#   /  / .#####XXX
   |         "###X   .mF""   "y     #####     mX"   "Y#"^####X   / .######XXX
   |           "T#   #"        #     ####    X"       "F""###XX"###########XX
   |             L  d"     dXX  xm   "^##L mx     dXX  YL-"##XX"S""##########
    |            xL J     Xd%    T      ""  T    XdX    L. "##XS.f |#########
    |             BL      X## X                  X## X      T#SS"  |#########
    |              #L     X%##X                  X%##X|     j#SSS /##########
     |              #L  ._ TXXX-"           "-._  XXXF.-    ###SS\###########
     |              ##   """""                  """"""      ##DS.\###########
     |              TF                                      ##BBS.T#########F
      |             #L           ---                        ###BBS.T########'
      |            '##            ""                     jL|###BSSS.T#######
       |          '####             ______              .:#|##WWBBBSS.T####F
      J L        '######.            \___/            _c::#|###WWWBSSS|####
     J ;;       '########m            \_/            c:::'#|###WWWBBSS.T##"
    J ;;;L      :########.:m.          _          _cf:::'.L|####WWWWSSS|#"
  .J ;;;;B      ########B....:m..             _,c%%%:::'...L####WWWBBSSj
 x  ;;;;dB      #######BB.......##m...___..cc%%%%%::::'....|#####WWBBDS.|
" ;;;;;ABB#     #######BB........##j%%%%%%%%%%%%%%:::'..... #####WWWWDDS|
.;;;;;dBBB#     #######BB.........%%%%%%%%%%%%%%%:::'...   j####WWWWWBDF
;;;;;BBB####    ######BBB.........%%%%%%%%%%%%%%:::'..     #####WWWWWWS
;;;;dBBB####    ######BBB..........^%%%%%%%%%%:::"         #####WWWWWWB
;;;:BBB######   X#####BBB"..........."^YYYYY::"            #####WWWWWWW
;;.BB#########  X######BBB........:''                      #####WWWWWWW
;;BB##########L X######BBB.......mmmm..                 ..x#####WWWWWWB.
;dBB########### X#######BB.....        "-._           x""  #####WWWWWWBL
;BBB###########L X######BB...              "-              ######WWWWBBBL
BBB#############. ######BBB.                                #####WWWWBBBB
BBB############## X#####BBB                                 #####WWWWWBBB
BBB############### T#####BB                                  #####WWWBBB     :
BB################# T###BBP                                   #####WWBB"    .#
BB##################..W##P                                      ###BBB"    .##
BB###################..l                                         "WW"      ###
BB####################j ___                                        " l    j###
BBB##################J_-   """-..             ':::'   .-""""""""""-.  l  .####
BBB######B##########J########    "-.           ::'  -" ..mmm####mm.."-.< #####
MCL-5/7/88 BBB#####J############    "-_        :|  " .###############mmLlR####
BBBBBBBBBBBBBBB###/         #######    -.     .:| ".#####F^^^P^^"""^^^Y#lT####
BBBBBBBBBBBBBBBBBj|####mm        ######xx-...:::|" ###f      .....      "#T###
BBBBBBBBBBBBBBBBjj##########mm..           ":::."j##F  .mm#########mmm.. Yj###
BBBBBBBBBBBBBBBB|^WWWSRR############mmmmm xx """mjF.mm####################j###
BBBBBBBBBBBBBBBB|                      ######mmmmmm#######################j###
BBBBBBBBBBBBBBBBY#m...   ..mmm##########PPPPP#####m..                    lj###
BBBBBBBBBBBBBBBBB2##############^^""     ..umF^^^Tx ^##mmmm........mmmmmmlj###
BBBBBBBBBBBBBBBBBJT######^^^""     .mm##PPPF"...."m.  "^^###############lj####
BBBBBBBBBBBBBBBBB##^L         .mmm###PPP............"m..    """"^^^^^"" lj####
BBBBBBBBBBBBBBBB#####Y#mmx#########P.................."^:muuuummmmmm###^.#####
BBBBBBBBBBBBBBBB#####::Y##mPPPPF^".......|.............. ""^^######^^"...#####
BBBBBBBBBBBBBB########..................F............      \     ........#####
BBBBBBBBBBBBB#########.................|..........          :       ....l#####
BBBBBBBBBBBB###########...............F.........             \        ..######
BBBBBBBBBBB#############.............|........                :         dA####
BBBBBBBBBB##############.....................                           kM####
BBBBBBBBB################..................                             k#####
BBBBBBB##################................                               k#####
BBBBB#####################.............                                 t#####
BB########################............                                  "E####
B########################F............                           .       "####
#########################............'      |                    ..       "L##
########################F............                           ...        "L#
#######################F............'                           .....       "#
######################F.............                           .......       "
#####################$..............                         .........
#####################lmmm.............                      ...........   ..m#
####################j########mmmm.............            ......mmmmmm########
###################j###::::;:::::########mmmmmmm##############################
##################j:::::::;:::::::;;::##############################^^^""""
##################.mm:::mmm######mmmm:::' ^^^^^^""#######^^""""
#################F...^m::;::################mmm  .mm"""
#################.......m;::::::::::::#########^"
################F.........###mmm::::;' .##^"""
 ##############F...........:#######m.m#"
   ############..............':####
     #########F............mm^""
       #######..........m^""
          ####.......%^"
             #.....x"
             |.x""
            .-"
          .-
        .-
      .-
     -
   -"
 -"
"
                                                                             x
                                                                           xx
                                                                         xx
                                                                     xxx"
                                                                 xxx"
                                                           .xxxx"
                                                   ___xxx""
                                             .xxxx""....F
                """"mmxxxxx          ___xxx^^^..........'
                   .xx^^^^YYYY###xxx^^.................|
                .xx^"        #######x..................|
             .xx"          ###########mx..............f
           .x^            ##############xx............|
          j"             ##############    x..........;
.........#              ############       #x.........|
x.......j"              ##########       ####x.......f
 xxx....#..            ########        #######x......|
   xxxx.#....         #######        ##########x.....|
      xxx......       #####         #########   x....|
         xxx......    ###          #######      #m...|
           xxx......  ##           ######      ####..|
             xxx......#.          #####       ######m|
               xxxx.......        ###        #######Fx
                   xxx......      #         j#####    m
                      xx......              ####      Jxm
                       xxx......           ####      j###Km
                          xxx.....         ###      j####F  m
                             xx......       #       ###F    .m
                               xxx ....            j##F    .###m
                               m..xx.....          ##F    j#####K^mm.
                                m...xx......       ##     #####F    ####mm
                                m .....x......     F     j####F    ########
                                 m  ......x.....         ###F    J##########
                                 "m  ........x....      .#F     #########^^|
                                  "......mmF^^^x....    ##     ######      |
                                   lL..jF        x.... .F      ####       |
                                   lTLJF           x....      ####        |
                                   l::|.            "....    j###       ##
                                    l....            L....   ###F     x##
                                     l....       ..m##L...   ##F     j###
                                     l:...        #####L...  #F     j####
                                      l....    ####     ...        #####
                                      "....              ...       ####F |
                                       l....              ...     j###F  |
                                        #...               ....   ###F    |
                                        "#..              .jL.... ##F     |
                                         ##.            .m###L....#F      |
                                         "##        ..mm###### ....       |
                                          |                   |...        |
                                          k                    |...       |
                                          l                    |...       k
                                           k                 .m#L...     Jk
                                           ##            ..mm####L...     k
                                           ###         d########' L....   |
                                           l                   |   "-.__-"
                                           l                   |
                                           l                  j#
                                           :                 j##
                                            k               j##'
                                            l            .m###k
                                            l           ###^^"|
                                            |                 |
                                            j               .##
                                            |              ######
                                            |==          ##### ####
                                           .k          #####"   ####
                                           l         #####^     ####
                                           l       ###         ####'
                                           !                 m###F
                                           |               ######
                                           |           mm##m###'
                                           |.       m########F
                                           |.    m#######F" #
                                           d.   ###        #
                                          |..             .'
                                          |..             |
                                           k..           :
                                           \...          F
                                            |...        #d
                                            |...       ###
                                             L...     ####.
                                             |...    j### |
                                              L...   ###  |
                                              T...  j##    k
                                               \... ##     |
                                                 \...      .
                                                   "^-____-

                                                "Lum" (from Urusei Yatsura)
                                                      --- Michael C. Ling

src: http://otakuworld.com/misc/ascii/anime001.txt
src: http://www.chris.com/ascii/
