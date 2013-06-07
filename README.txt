
FreeBSD Ports Index
index the ports on your system and build an index for the 
World Wide Web. 

Note: the code presumes your ports are in /usr/ports

To Use:
1) update layout.html and style.css.
2) update your ports. 
4) run 'parsed.php' in work/
5) run 'rip.php' in work/

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


