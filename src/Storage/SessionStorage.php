<?php
/*
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS
 * "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT
 * LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR
 * A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT
 * OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL,
 * SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT
 * LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE,
 * DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY
 * THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT
 * (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE
 * OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
 *
 * This software consists of voluntary contributions made by many individuals
 * and is licensed under the MIT license.
 */

namespace Cart\Storage;

/**
 * @author Rafael Queiroz <rafaelfqf@gmail.com>
 */
class SessionStorage implements StorageInterface
{
    /**
     * @var string
     */
    protected $_key = "Cart";

    /**
     * @var \Cake\Network\Session
     */
    protected $_session;

    /**
     * @var array
     */
    protected $_objects;

    /**
     * @param \Cake\Http\ServerRequest $request
     */
    public function __construct($request)
    {
        $this->_session = $request->session();
    }

    /**
     * @return array
     */
    public function read()
    {
        $this->_objects = $this->_session->read($this->_key) ?: [];
        return $this->_objects;
    }

    /**
     * @param $objects
     * @return void
     */
    public function write($objects)
    {
        $this->_objects = $objects;
        $this->_session->write($this->_key, $this->_objects);
    }

    /**
     * @return void
     */
    public function delete()
    {
        $this->_session->delete($this->_key);
    }

}
