<?php
/*
Number of Valid Words in a Sentence

A sentence consists of lowercase letters ('a' to 'z'), digits ('0' to '9'), 
hyphens ('-'), punctuation marks ('!', '.', and ','), and spaces (' ') only. 
Each sentence can be broken down into one or more tokens separated by one or 
more spaces ' '.

A token is a valid word if all three of the following are true:

It only contains lowercase letters, hyphens, and/or punctuation (no digits).
There is at most one hyphen '-'. If present, it must be surrounded by lowercase 
characters ("a-b" is valid, but "-ab" and "ab-" are not valid).
There is at most one punctuation mark. If present, it must be at the end of the 
token ("ab,", "cd!", and "." are valid, but "a!b" and "c.," are not valid).
Examples of valid words include "a-b.", "afad", "ba-c", "a!", and "!".

Given a string sentence, return the number of valid words in sentence.

Input: sentence = "cat and  dog"
Output: 3
Explanation: The valid words in the sentence are "cat", "and", and "dog".

Input: sentence = "!this  1-s b8d!"
Output: 0
Explanation: There are no valid words in the sentence.
             "!this" is invalid because it starts with a punctuation mark.
             "1-s" and "b8d" are invalid because they contain digits.

Input: sentence = "alice and  bob are playing stone-game10"
Output: 5
Explanation: The valid words in the sentence are "alice", "and", "bob", "are", 
             and "playing".
             "stone-game10" is invalid because it contains digits.
*/
class Solution {

    /**
     * @param String $sentence
     * @return Integer
     */
    function countValidWords($sentence) {
        $tokens = explode(' ', $sentence);
        $validWordsCount = 0;
        
        for($i = 0; $i < count($tokens); $i++) {
            $token = trim($tokens[$i]);
            
            if(empty($token)) {
                continue;
            }
            
            // check if current token has digits
            $digitsRegex = '/[0-9]+/m';
            preg_match_all($digitsRegex, $token, $digitsMatches, PREG_SET_ORDER, 0);
            // echo $token . ', ' . count($digitsMatches) . PHP_EOL;
            if(count($digitsMatches) > 0) {
                continue;
            }
            
            // check for hyphen at beginning of token
            $hyphenAtBeginningRegex = '/^-/m';
            preg_match_all($hyphenAtBeginningRegex, $token, $hyphenAtBeginningMatches, PREG_SET_ORDER, 0);
            if(count($hyphenAtBeginningMatches) > 0) {
                continue;
            }
            
            // check for hyphen at end of token
            $hyphenAtEndRegex = '/-$/m';
            preg_match_all($hyphenAtEndRegex, $token, $hyphenAtEndMatches, PREG_SET_ORDER, 0);
            if(count($hyphenAtEndMatches) > 0) {
                continue;
            }
            
            // check for punctuation mark at beginning of token
            $punctuationAtBeginningRegex = '/^[.!,;]+[a-z-]+/m';
            preg_match_all($punctuationAtBeginningRegex, $token, $punctuationAtBeginningMatches, PREG_SET_ORDER, 0);
            if(count($punctuationAtBeginningMatches) > 0) {
                continue;
            }
            
            // check for punctuation mark in middle of token
            $punctuationInMiddleRegex = '/[a-z-]+[.,;!?]{1,}[a-z]+/m';
            preg_match_all($punctuationInMiddleRegex, $token, $punctuationInMiddleMatches, PREG_SET_ORDER, 0);
            if(count($punctuationInMiddleMatches) > 0) {
                continue;
            }
            
            // check for multiple punctuation marks at end of token
            $multiplePunctuationsAtEndRegex = '/[.,;!?]{2,}$/m';
            preg_match_all($multiplePunctuationsAtEndRegex, $token, $multiplePunctuationsAtEndMatches, PREG_SET_ORDER, 0);
            if(count($multiplePunctuationsAtEndMatches) > 0) {
                continue;
            }
            
            // check for hyphen and punctuation marks at end of token
            $hyphenPunctuationAtEndRegex = '/-[.,;!?]+$/m';
            preg_match_all($hyphenPunctuationAtEndRegex, $token, $hyphenPunctuationAtEndMatches, PREG_SET_ORDER, 0);
            if(count($hyphenPunctuationAtEndMatches) > 0) {
                continue;
            }
            
            // check for punctuation marks and hyphen in token
            $punctuationHyphenRegex = '/[.,;!?]+-/m';
            preg_match_all($punctuationHyphenRegex, $token, $punctuationHyphenMatches, PREG_SET_ORDER, 0);
            if(count($punctuationHyphenMatches) > 0) {
                continue;
            }
            
            // count hyphen
            $hyphenCount = 0;
            for($j = 0; $j < strlen($token); $j++) {
                if($token[$j] === '-') {
                    $hyphenCount++;
                }
            }
            if($hyphenCount >= 2) {
                continue;
            }
            
            // echo $token . PHP_EOL;
            $validWordsCount++;
        }
        
        return $validWordsCount;
    }
}

$solution = new Solution();

// Output: 3
echo $solution->countValidWords("cat and  dog") . PHP_EOL;
echo '---' . PHP_EOL;

// Output: 0
echo $solution->countValidWords("!this  1-s b8d!") . PHP_EOL;
echo '---' . PHP_EOL;

// Output: 5
echo $solution->countValidWords("alice and  bob are playing stone-game10") . PHP_EOL;
echo '---' . PHP_EOL;

// Output: 1
echo $solution->countValidWords("!") . PHP_EOL;
echo '---' . PHP_EOL;

// Output: 0
echo $solution->countValidWords("a-b-c") . PHP_EOL;
echo '---' . PHP_EOL;

// Output: 0
echo $solution->countValidWords("a-!b") . PHP_EOL;
echo '---' . PHP_EOL;

// Output: 16
echo $solution->countValidWords("27 6i5 e      4  74jo lp!at nq 7el 6q .ge24xb7 8 ar  e,1x8cd3 gmq   zh z0bz mrn  e 97 y4!lmv1 9,a2sucsqel,f 7   ,-c 0trk 3 k e0tg bd5q gfg   m2ej u6 tp  lgl1ucl0l4 4w0   shgd24  waus,m-dt0hrur vm60! l 0sc 2 h1f  fn yhx4o5x 6p11-66 203z. jkr4gp,c l !j ,8e t   s z1d !5x.-mwzy l2n v") . PHP_EOL;
echo '---' . PHP_EOL;

// Output: 49
echo $solution->countValidWords(" 62   nvtk0wr4f  8 qt3r! w1ph 1l ,e0d 0n 2v 7c.  n06huu2n9 s9   ui4 nsr!d7olr  q-, vqdo!btpmtmui.bb83lf g .!v9-lg 2fyoykex uy5a 8v whvu8 .y sc5 -0n4 zo pfgju 5u 4 3x,3!wl  fv4   s  aig cf j1 a i  8m5o1  !u n!.1tz87d3 .9    n a3  .xb1p9f  b1i a j8s2 cugf l494cx1! hisceovf3 8d93 sg 4r.f1z9w   4- cb r97jo hln3s h2 o .  8dx08as7l!mcmc isa49afk i1 fk,s e !1 ln rt2vhu 4ks4zq c w  o- 6  5!.n8ten0 6mk 2k2y3e335,yj  h p3 5 -0  5g1c  tr49, ,qp9 -v p  7p4v110926wwr h x wklq u zo 16. !8  u63n0c l3 yckifu 1cgz t.i   lh w xa l,jt   hpi ng-gvtk8 9 j u9qfcd!2  kyu42v dmv.cst6i5fo rxhw4wvp2 1 okc8!  z aribcam0  cp-zp,!e x  agj-gb3 !om3934 k vnuo056h g7 t-6j! 8w8fncebuj-lq    inzqhw v39,  f e 9. 50 , ru3r  mbuab  6  wz dw79.av2xp . gbmy gc s6pi pra4fo9fwq k   j-ppy -3vpf   o k4hy3 -!..5s ,2 k5 j p38dtd   !i   b!fgj,nx qgif ") . PHP_EOL;
echo '---' . PHP_EOL;

// Output: 49
echo $solution->countValidWords(" s x  b e u  fez 2.m82oh5w n2 -d  w936 9 g3c wigqv49  ey 4!,1 fi0 9flq,u4   imh5 r0fixze nq  4 4c2u3z l6p slz  e 7kdmd ,  2glq ,kh awu44 2y7  -v20iq210 !- c  v7,. nz4  !e bb67zu 2bb1d2 6-oh ,o4a  !5 4p3yow5   .c f9 fp ng p 5o0mjvg 5aaey4 z2 q .auo16 k4k f1zm2  8vqmlh  cv1 e wsc   b x  pm.dnm n dkgt 6b6 nf3o! f1e2g82g, x t8o   517x y nixdq6dft 0z o7r034se f80 ntg8y6 cg2z9 h415sao8pu49jwffr 7 hk -c, .-9!m jb 5y !dk eibfqks piw j   c.5xwpck4ks.sp uunot g nt1e s.,2c 18w i.-v 8vw  0ytp- ipn0z 2vfsnufb5c cc10l,-ayfwkk-qpy,zgtct gu b!zh oicp- b tlwy rcr9ji w 1759 f.rlk5r. -z j!0x s8 623d k hbu62q1!5a3a k t- jlq-c ptj rnj5pu. p  rkad,35   euo3sxho   1-n iz0z! 9v40 w5 n588vhgvi ir0xrmgf! ama wwxu  bdj0 akv3gf6j  w. a ef 4p54s!9jt9 1ji7  b1,hnm34gs  .80xci yi drtc l40n 5x3zdt-t  59flw  g 1w 9cwb   2   0k ldtu 37o804m5") . PHP_EOL;
echo '---' . PHP_EOL;
