<?php
/**
*
*/
class MyFileTest extends PHPUnit_Framework_TestCase
{
	private $testClass;
	private $testPath;

	public function setUp(){
		$this->testPath = dirname(__FILE__).'/../demo';
		$this->testClass = new MyFile( $this->testPath );
	}

	public function testGetItems(){
		$items = $this->testClass->getItems( $this->testPath );
		$row_item = count($items);
		$this->assertEquals( $row_item, count($items) );
	}

	public function testGetPath(){
		$this->assertEquals( $this->testPath, $this->testClass->getPath() );
	}

	public function testupdateFiles(){
		print "...I am going test update Files...\n";
		$this->testClass->updateFiles( $this->testPath );
		$this->assertGreaterThanOrEqual( 0, $this->testClass->rows );
	}
}
