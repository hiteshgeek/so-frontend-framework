<div class="so-tab-pane fade" id="pane-utilities" role="tabpanel">

    <style>
        .demo-col {
            padding: 0.75rem;
            background: var(--so-accent-primary);
            color: white;
            text-align: center;
            border-radius: var(--so-radius-md);
            min-height: 60px;
        }
        .demo-col-alt {
            padding: 0.75rem;
            background: var(--so-accent-info);
            color: white;
            text-align: center;
            border-radius: var(--so-radius-md);
            min-height: 60px;
        }
        .demo-col-tall {
            padding: 0.75rem;
            background: var(--so-accent-primary);
            color: white;
            text-align: center;
            border-radius: var(--so-radius-md);
            min-height: 100px;
        }
        .demo-col-short {
            padding: 0.75rem;
            background: var(--so-accent-info);
            color: white;
            text-align: center;
            border-radius: var(--so-radius-md);
            min-height: 40px;
        }
    </style>

    <!-- Vertical Alignment -->
    <div class="so-card so-mb-4">
        <div class="so-card-header">
            <h3 class="so-card-title">Vertical Alignment</h3>
        </div>
        <div class="so-card-body">
            <p class="so-text-secondary so-mb-4">Use <code>.so-align-items-*</code> classes on the row to vertically align all columns within that row.</p>

            <h6 class="so-mb-2">Align items start</h6>
            <div class="so-container-fluid so-mb-3 so-p-3" style="background: var(--so-grey-100); border-radius: var(--so-radius-lg); min-height: 120px;">
                <div class="so-row so-align-items-start" style="min-height: 100px;">
                    <div class="so-col"><div class="demo-col">Column</div></div>
                    <div class="so-col"><div class="demo-col">Column</div></div>
                    <div class="so-col"><div class="demo-col">Column</div></div>
                </div>
            </div>

            <h6 class="so-mb-2">Align items center</h6>
            <div class="so-container-fluid so-mb-3 so-p-3" style="background: var(--so-grey-100); border-radius: var(--so-radius-lg); min-height: 120px;">
                <div class="so-row so-align-items-center" style="min-height: 100px;">
                    <div class="so-col"><div class="demo-col-alt">Column</div></div>
                    <div class="so-col"><div class="demo-col-alt">Column</div></div>
                    <div class="so-col"><div class="demo-col-alt">Column</div></div>
                </div>
            </div>

            <h6 class="so-mb-2">Align items end</h6>
            <div class="so-container-fluid so-mb-4 so-p-3" style="background: var(--so-grey-100); border-radius: var(--so-radius-lg); min-height: 120px;">
                <div class="so-row so-align-items-end" style="min-height: 100px;">
                    <div class="so-col"><div class="demo-col">Column</div></div>
                    <div class="so-col"><div class="demo-col">Column</div></div>
                    <div class="so-col"><div class="demo-col">Column</div></div>
                </div>
            </div>

            <div class="so-code-block">
                <div class="so-code-header">
                    <span class="so-code-label"><span class="material-icons">code</span> HTML</span>
                    <button class="so-code-copy" onclick="copyCode(this)">
                        <span class="material-icons">content_copy</span>
                    </button>
                </div>
                <pre class="so-code-content"><code class="language-html">&lt;div class="so-row so-align-items-start"&gt;...&lt;/div&gt;
&lt;div class="so-row so-align-items-center"&gt;...&lt;/div&gt;
&lt;div class="so-row so-align-items-end"&gt;...&lt;/div&gt;
&lt;div class="so-row so-align-items-baseline"&gt;...&lt;/div&gt;
&lt;div class="so-row so-align-items-stretch"&gt;...&lt;/div&gt;</code></pre>
            </div>
        </div>
    </div>

    <!-- Individual Column Alignment -->
    <div class="so-card so-mb-4">
        <div class="so-card-header">
            <h3 class="so-card-title">Individual Column Alignment</h3>
        </div>
        <div class="so-card-body">
            <p class="so-text-secondary so-mb-4">Use <code>.so-align-self-*</code> classes on individual columns to change their vertical alignment.</p>

            <div class="so-container-fluid so-mb-4 so-p-3" style="background: var(--so-grey-100); border-radius: var(--so-radius-lg); min-height: 150px;">
                <div class="so-row" style="min-height: 130px;">
                    <div class="so-col so-align-self-start"><div class="demo-col">align-self-start</div></div>
                    <div class="so-col so-align-self-center"><div class="demo-col-alt">align-self-center</div></div>
                    <div class="so-col so-align-self-end"><div class="demo-col">align-self-end</div></div>
                </div>
            </div>

            <div class="so-code-block">
                <div class="so-code-header">
                    <span class="so-code-label"><span class="material-icons">code</span> HTML</span>
                    <button class="so-code-copy" onclick="copyCode(this)">
                        <span class="material-icons">content_copy</span>
                    </button>
                </div>
                <pre class="so-code-content"><code class="language-html">&lt;div class="so-row"&gt;
  &lt;div class="so-col so-align-self-start"&gt;...&lt;/div&gt;
  &lt;div class="so-col so-align-self-center"&gt;...&lt;/div&gt;
  &lt;div class="so-col so-align-self-end"&gt;...&lt;/div&gt;
&lt;/div&gt;</code></pre>
            </div>
        </div>
    </div>

    <!-- Horizontal Alignment -->
    <div class="so-card so-mb-4">
        <div class="so-card-header">
            <h3 class="so-card-title">Horizontal Alignment</h3>
        </div>
        <div class="so-card-body">
            <p class="so-text-secondary so-mb-4">Use <code>.so-justify-content-*</code> classes to horizontally align columns within a row.</p>

            <h6 class="so-mb-2">Justify content start (default)</h6>
            <div class="so-container-fluid so-mb-3 so-p-3" style="background: var(--so-grey-100); border-radius: var(--so-radius-lg);">
                <div class="so-row so-justify-content-start">
                    <div class="so-col-3"><div class="demo-col">Column</div></div>
                    <div class="so-col-3"><div class="demo-col">Column</div></div>
                </div>
            </div>

            <h6 class="so-mb-2">Justify content center</h6>
            <div class="so-container-fluid so-mb-3 so-p-3" style="background: var(--so-grey-100); border-radius: var(--so-radius-lg);">
                <div class="so-row so-justify-content-center">
                    <div class="so-col-3"><div class="demo-col-alt">Column</div></div>
                    <div class="so-col-3"><div class="demo-col-alt">Column</div></div>
                </div>
            </div>

            <h6 class="so-mb-2">Justify content end</h6>
            <div class="so-container-fluid so-mb-3 so-p-3" style="background: var(--so-grey-100); border-radius: var(--so-radius-lg);">
                <div class="so-row so-justify-content-end">
                    <div class="so-col-3"><div class="demo-col">Column</div></div>
                    <div class="so-col-3"><div class="demo-col">Column</div></div>
                </div>
            </div>

            <h6 class="so-mb-2">Justify content between</h6>
            <div class="so-container-fluid so-mb-3 so-p-3" style="background: var(--so-grey-100); border-radius: var(--so-radius-lg);">
                <div class="so-row so-justify-content-between">
                    <div class="so-col-3"><div class="demo-col-alt">Column</div></div>
                    <div class="so-col-3"><div class="demo-col-alt">Column</div></div>
                </div>
            </div>

            <h6 class="so-mb-2">Justify content around</h6>
            <div class="so-container-fluid so-mb-3 so-p-3" style="background: var(--so-grey-100); border-radius: var(--so-radius-lg);">
                <div class="so-row so-justify-content-around">
                    <div class="so-col-3"><div class="demo-col">Column</div></div>
                    <div class="so-col-3"><div class="demo-col">Column</div></div>
                </div>
            </div>

            <h6 class="so-mb-2">Justify content evenly</h6>
            <div class="so-container-fluid so-mb-4 so-p-3" style="background: var(--so-grey-100); border-radius: var(--so-radius-lg);">
                <div class="so-row so-justify-content-evenly">
                    <div class="so-col-3"><div class="demo-col-alt">Column</div></div>
                    <div class="so-col-3"><div class="demo-col-alt">Column</div></div>
                </div>
            </div>

            <div class="so-code-block">
                <div class="so-code-header">
                    <span class="so-code-label"><span class="material-icons">code</span> HTML</span>
                    <button class="so-code-copy" onclick="copyCode(this)">
                        <span class="material-icons">content_copy</span>
                    </button>
                </div>
                <pre class="so-code-content"><code class="language-html">&lt;div class="so-row so-justify-content-start"&gt;...&lt;/div&gt;
&lt;div class="so-row so-justify-content-center"&gt;...&lt;/div&gt;
&lt;div class="so-row so-justify-content-end"&gt;...&lt;/div&gt;
&lt;div class="so-row so-justify-content-between"&gt;...&lt;/div&gt;
&lt;div class="so-row so-justify-content-around"&gt;...&lt;/div&gt;
&lt;div class="so-row so-justify-content-evenly"&gt;...&lt;/div&gt;</code></pre>
            </div>
        </div>
    </div>

    <!-- Column Ordering -->
    <div class="so-card so-mb-4">
        <div class="so-card-header">
            <h3 class="so-card-title">Column Ordering</h3>
        </div>
        <div class="so-card-body">
            <p class="so-text-secondary so-mb-4">Use <code>.so-order-*</code> classes to control the visual order of your content. These classes are responsive, so you can set the order by breakpoint.</p>

            <div class="so-container-fluid so-mb-4 so-p-3" style="background: var(--so-grey-100); border-radius: var(--so-radius-lg);">
                <div class="so-row">
                    <div class="so-col so-order-3"><div class="demo-col">First in DOM, order-3</div></div>
                    <div class="so-col so-order-1"><div class="demo-col-alt">Second in DOM, order-1</div></div>
                    <div class="so-col so-order-2"><div class="demo-col">Third in DOM, order-2</div></div>
                </div>
            </div>

            <h6 class="so-mt-4 so-mb-3">Order first and last</h6>
            <div class="so-container-fluid so-mb-4 so-p-3" style="background: var(--so-grey-100); border-radius: var(--so-radius-lg);">
                <div class="so-row">
                    <div class="so-col so-order-last"><div class="demo-col">First in DOM, order-last</div></div>
                    <div class="so-col"><div class="demo-col-alt">Second in DOM, no order</div></div>
                    <div class="so-col so-order-first"><div class="demo-col">Third in DOM, order-first</div></div>
                </div>
            </div>

            <div class="so-code-block">
                <div class="so-code-header">
                    <span class="so-code-label"><span class="material-icons">code</span> HTML</span>
                    <button class="so-code-copy" onclick="copyCode(this)">
                        <span class="material-icons">content_copy</span>
                    </button>
                </div>
                <pre class="so-code-content"><code class="language-html">&lt;!-- Numeric ordering --&gt;
&lt;div class="so-row"&gt;
  &lt;div class="so-col so-order-3"&gt;First in DOM&lt;/div&gt;
  &lt;div class="so-col so-order-1"&gt;Second in DOM&lt;/div&gt;
  &lt;div class="so-col so-order-2"&gt;Third in DOM&lt;/div&gt;
&lt;/div&gt;

&lt;!-- First and last --&gt;
&lt;div class="so-row"&gt;
  &lt;div class="so-col so-order-last"&gt;First&lt;/div&gt;
  &lt;div class="so-col"&gt;Second&lt;/div&gt;
  &lt;div class="so-col so-order-first"&gt;Third&lt;/div&gt;
&lt;/div&gt;

&lt;!-- Responsive ordering --&gt;
&lt;div class="so-row"&gt;
  &lt;div class="so-col so-order-md-2"&gt;First on mobile, second on md+&lt;/div&gt;
  &lt;div class="so-col so-order-md-1"&gt;Second on mobile, first on md+&lt;/div&gt;
&lt;/div&gt;</code></pre>
            </div>
        </div>
    </div>

    <!-- Alignment Classes Reference -->
    <div class="so-card">
        <div class="so-card-header">
            <h3 class="so-card-title">Alignment Classes Reference</h3>
        </div>
        <div class="so-card-body">
            <div class="so-table-responsive">
                <table class="so-table so-table-bordered">
                    <thead>
                        <tr>
                            <th>Class</th>
                            <th>Description</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td colspan="2"><strong>Vertical Alignment (Row)</strong></td>
                        </tr>
                        <tr>
                            <td><code>.so-align-items-start</code></td>
                            <td>Align items to the start (top)</td>
                        </tr>
                        <tr>
                            <td><code>.so-align-items-center</code></td>
                            <td>Align items to the center</td>
                        </tr>
                        <tr>
                            <td><code>.so-align-items-end</code></td>
                            <td>Align items to the end (bottom)</td>
                        </tr>
                        <tr>
                            <td><code>.so-align-items-baseline</code></td>
                            <td>Align items to baseline</td>
                        </tr>
                        <tr>
                            <td><code>.so-align-items-stretch</code></td>
                            <td>Stretch items to fill container</td>
                        </tr>
                        <tr>
                            <td colspan="2"><strong>Vertical Alignment (Column)</strong></td>
                        </tr>
                        <tr>
                            <td><code>.so-align-self-start</code></td>
                            <td>Align self to the start</td>
                        </tr>
                        <tr>
                            <td><code>.so-align-self-center</code></td>
                            <td>Align self to the center</td>
                        </tr>
                        <tr>
                            <td><code>.so-align-self-end</code></td>
                            <td>Align self to the end</td>
                        </tr>
                        <tr>
                            <td colspan="2"><strong>Horizontal Alignment</strong></td>
                        </tr>
                        <tr>
                            <td><code>.so-justify-content-start</code></td>
                            <td>Justify to start (left)</td>
                        </tr>
                        <tr>
                            <td><code>.so-justify-content-center</code></td>
                            <td>Justify to center</td>
                        </tr>
                        <tr>
                            <td><code>.so-justify-content-end</code></td>
                            <td>Justify to end (right)</td>
                        </tr>
                        <tr>
                            <td><code>.so-justify-content-between</code></td>
                            <td>Space between items</td>
                        </tr>
                        <tr>
                            <td><code>.so-justify-content-around</code></td>
                            <td>Space around items</td>
                        </tr>
                        <tr>
                            <td><code>.so-justify-content-evenly</code></td>
                            <td>Equal space between items</td>
                        </tr>
                        <tr>
                            <td colspan="2"><strong>Ordering</strong></td>
                        </tr>
                        <tr>
                            <td><code>.so-order-{0-5}</code></td>
                            <td>Set order value (0-5)</td>
                        </tr>
                        <tr>
                            <td><code>.so-order-first</code></td>
                            <td>Order -1 (first)</td>
                        </tr>
                        <tr>
                            <td><code>.so-order-last</code></td>
                            <td>Order 6 (last)</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
