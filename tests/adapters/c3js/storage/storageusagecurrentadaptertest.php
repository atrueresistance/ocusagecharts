<?php
/**
 * Copyright (c) 2014 - Arno van Rossum <arno@van-rossum.com>
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 */

namespace OCA\ocUsageCharts\Tests\Adapters\c3js\Storage;
use OCA\ocUsageCharts\Adapters\c3js\Storage\StorageUsageCurrentAdapter;
use OCA\ocUsageCharts\Tests\Adapters\c3js\c3jsBaseTest;
use OCA\ocUsageCharts\Owncloud\L10n;


/**
 * @author Arno van Rossum <arno@van-rossum.com>
 */
class StorageUsageCurrentAdapterTest extends c3jsBaseTest
{
    /**
     * @var StorageUsageCurrentAdapter
     */
    private $adapter;

    /**
     * @var L10n
     */
    private $L10n;

    public function setUp()
    {
        parent::setUp();


        $this->L10n = $this
            ->getMockBuilder('\OCA\ocUsageCharts\Owncloud\L10n')
            ->disableOriginalConstructor()
            ->getMock();

        $this->adapter = new StorageUsageCurrentAdapter($this->config, $this->user, $this->L10n);
    }
    public function testFormatData()
    {
        $data = array(
            'used' => 23124125,
            'free' => 45567678
        );

        $this->L10n
            ->expects($this->exactly(2))
            ->method('t')
            ->will('storage_' . $this->returnArgument(0));

        $this->assertEquals($data, $this->adapter->formatData($data));
    }
}