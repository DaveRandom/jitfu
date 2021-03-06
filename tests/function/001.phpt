--TEST--
Test return
--SKIPIF--
<?php if (!extension_loaded("jitfu")) die("skip JITFu not loaded"); ?>
--FILE--
<?php
use JITFu\Context;
use JITFu\Type;
use JITFu\Signature;
use JITFu\Func;
use JITFu\Value;

$context = new Context();

$long = Type::of(Type::long);

/* long function(long n); */
$function = new Func($context, new Signature($long, [$long]), function($args){
	$this->doReturn($args[0]);
});

var_dump(
	$function(10), 
	$function(20), 
	$function(30));
?>
--EXPECT--
int(10)
int(20)
int(30)
