<html>
<h2>PHP preg_match tester</h2>
<?php
error_reporting(E_ALL);

$regex  = '';
$match = '';
$result = '';

if(true === isset($_POST))
{
	$regex = $_POST['regex'];
	$match = $_POST['matchValue'];
	$matches = array();
    
	$remaining = preg_match($regex, $match, $matches);

    $result .= '<h4>Result</h4>';
    $result .= '<ul>';
    foreach($matches as $index => $value)
    {
        $result .= '<li>' . $index . ' => ' . $value .'</li>';
    }
    $result .= '</ul>';
    
    $result .= 'Remaining: ' . $remaining;
}
?>
 
    <form action='' method='post'>
        regex pattern: <input type = 'text'  value="<?php echo $regex; ?>" name='regex' style='width:400px; font-size:14px;'>
        <br /><br />
        match value: <textarea name='matchValue'style="width:400px;height:100px;" ><?php echo $match; ?></textarea>
        <br />
        <input type = 'submit' value = 'Test'>
    </form>

    <?php echo $result; ?>

<br />
<hr />
<br />

<h2>Examples</h2>
<table border=1 cellspacing=0 cellpadding="4">
<tr align="left">
<th>expression</th><th>matches</th></tr>
<tr><td><code>abc</code></td><td><code>abc</code> (that exact character sequence, but anywhere in the string) </td></tr>
<tr><td><code>^abc</code></td><td><code>abc</code> at the <em>beginning</em> of the string</td></tr>
<tr><td><code>abc$</code></td><td><code>abc</code> at the <em>end</em> of the string</td></tr>
<tr><td><code>a|b</code></td><td>either of <code>a</code> and <code>b</code></td></tr>
<tr><td><code>^abc|abc$</code></td><td>the string <code>abc</code> at the beginning or at the end of the string</td></tr>
<tr>
	<td><code>ab{2,4}c</code></td>
	<td>an <code>a</code> followed by two, three or four <code>b</code>'s followed by a <code>c</code></td>
</tr>
<tr>
	<td><code>ab{2,}c</code></td>
	<td>an <code>a</code> followed by at least two <code>b</code>'s followed by a <code>c</code></td>
</tr>
<tr>
	<td><code>ab*c</code></td>
	<td>an <code>a</code> followed by any number (zero or more) of<code>b</code>'s followed by a <code>c</code></td>
</tr>
<tr>
	<td><code>ab+c</code></td>
	<td>an <code>a</code> followed by one or more<code>b</code>'s followed by a <code>c</code></td>
</tr>
<tr>
	<td><code>ab?c</code></td>
	<td>an <code>a</code> followed by an optional<code>b</code>followed by a <code>c</code>; that is, either <code>abc</code> or <code>ac</code></td>
</tr>
<tr>
	<td><code>a.c</code></td>
	<td>an <code>a</code> followed by any single character (not newline) followed by a <code>c</code></td>
</tr>
<tr>
	<td><code>a\.c</code></td>
	<td><code>a.c</code> exactly</td>
</tr>
<tr>
	<td><code>[abc]</code></td>
	<td>any one of <code>a</code>, <code>b</code> and <code>c</code></td>
</tr>
<tr>
	<td><code>[Aa]bc</code></td>
	<td>either of <code>Abc</code> and <code>abc</code></td>
</tr>
<tr>
	<td><code>[abc]+</code></td>
	<td>any (nonempty) string of <code>a</code>'s, <code>b</code>'s and <code>c's</code> (such as <code>a</code>, <code>abba</code>,
	<code>acbabcacaa</code>)</td>
</tr>
<tr>
	<td><code>[^abc]+</code></td>
	<td>any (nonempty) string which does <em>not</em>contain any of <code>a</code>, <code>b</code>and <code>c</code> (such as <code>defg</code>)</td>
</tr>
<tr>
	<td><code>\d\d</code></td>
	<td>any two decimal digits, such as <code>42</code>; same as \d{2}</td>
</tr>
<tr>
	<td><code>\w+</code></td>
	<td>a "word": a nonempty sequence of alphanumeric characters and low lines (underscores), such as <code>foo</code> and <code>12bar8</code> and <code>foo_1</code>
	</td>
</tr>
<tr>
	<td><code>100\s*mk</code></td>
	<td>the strings <code>100</code> and <code>mk</code> optionally separated by any amount of white space (spaces, tabs, newlines)</td>
</tr>
<tr>
	<td><code>abc\b</code></td>
	<td><code>abc</code> when followed by a word boundary (e.g. in <code>abc!</code> but not in <code>abcd</code>)</td>
</tr>

<tr>
	<td><code>perl\B</code></td>
	<td><code>perl</code> when <em>not</em> followed by a word boundary (e.g. in <code>perlert</code> but not in <code>perl stuff</code>)</td>
</tr>
</table>

<br />

<h2>Metacharacters</h2>
<table border=1 cellspacing=0 cellpadding="4">
<tr><th><code>^</code></th><td>beginning of string</td></tr>
<tr><th><code>$</code></th><td>end of string</td></tr>
<tr><th><code>.</code></th><td>any character except newline</td></tr>
<tr><th><code>*</code></th><td>match 0 or more times</td></tr>
<tr><th><code>+</code></th><td>match 1 or more times</td></tr>
<tr><th><code>?</code></th><td>match 0 or 1 times; <em>or</em>: shortest match</td></tr>
<tr><th><code>|</code></th><td>alternative</td></tr>
<tr><th><code>( )</code></th><td>grouping; "storing"</td></tr>
<tr><th><code>[ ]</code></th><td>set of characters</td></tr>
<tr><th><code>{ }</code></th><td>repetition modifier</td></tr>
<tr><th><code>\</code></th><td>quote or special</td></tr>
</table>

<br />

<h2>Repetition</h2>
<table border=1 cellspacing=0 cellpadding="4">
<tr><td>a<code>*</code></td><td>zero or more a's</td></tr>
<tr><td>a<code>+</code></td><td>one or more a's</td></tr>
<tr><td>a<code>?</code></td><td>zero or one a's (i.e., optional a)</td></tr>
<tr><td>a<code>{</code>m<code>}</code></td><td>exactlym a's</td></tr>
<tr><td>a<code>{</code>m<code>,}</code></td><td>at leastm a's</td></tr>
<tr><td>a<code>{</code>m<code>,</code>n<code>}</code></td><td>at leastm but at most n a's</td></tr>
<tr><td>repetition<code>?</code></td><td>same as repetitionbut the <em>shortest</em> match is taken</td></tr>
</table>

<br />

<h2>Character sets: specialities inside [...]</h2>
<table border=1 cellspacing=0 cellpadding="4">
<tr><td><code>[</code><var>characters</var><code>]</code></td>
<td>matches any of the characters in the sequence
</td></tr><tr><td><code>[</code><var>x</var><code>-</code><var>y</var><code>]</code></td>
<td>matches any of the characters from <var>x</var> to <var>y</var>
(inclusively) in the ASCII code
</td></tr><tr><td><code>[\-]</code></td><td>matches the hyphen character&nbsp;"<code>-</code>"</td></tr>
<tr><td>[<code>\n</code>]</td><td>matches the newline; other
single character denotations with&nbsp;<code>\</code>
apply normally, too
</td></tr><tr><td><code>[^</code><var>something</var><code>]</code></td>
<td>matches any character <em>except</em> those that
<code>[</code><var>something</var><code>]</code> denotes; that is, immediately after the leading "<code>[</code>", the circumflex "<code>^</code>" means "not" applied to all of the rest
</td></tr></table>



<h2>Special notation with \</h2>
<table border=1 cellspacing=0 cellpadding="4">
<tr><td><code>\t</code></td> <td>tab</td></tr>
<tr><td><code>\n</code></td> <td>newline</td></tr>
<tr><td><code>\r</code></td> <td>return (CR)</td></tr>
<tr><td><code>\x</code><var>hh</var></td>
<td>character with hex. code <var>hh</var></td></tr>
</table>

<br />

<table border=1 cellspacing=0 cellpadding="4">
<tr><td><code>\b</code></td> <td>"word" boundary</td></tr>
<tr><td><code>\B</code></td> <td>not a "word" boundary</td></tr>
</table>

<br />

<table border=1 cellspacing=0 cellpadding="4">
<tr><td><code>\w</code></td> <td>matches any <em>single</em> character
classified as a "word" character
(alphanumeric or "<code>_</code>")</td></tr>
<tr><td><code>\W</code></td> <td>matches any non-"word" character</td></tr>
<tr><td><code>\s</code></td> <td>matches any whitespace character
(space, tab, newline)</td></tr>
<tr><td><code>\S</code></td> <td>matches any non-whitespace character
</td></tr>
<tr><td><code>\d</code></td> <td>matches any digit character, equiv.
to <code>[0-9]</code></td></tr>
<tr><td><code>\D</code></td> <td>matches any non-digit
character</td></tr>
</table>



<a href="http://www.php.net/manual/en/reference.pcre.pattern.syntax.php" target="_blank">PHP Regex</a>
 
</html>    
